<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function index()
    {
        $page = 1;

        if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
            $page = intval($_GET['pagina']);

            if ($page <= 0) {
                return redirect('posts');
            }
        }

        $itensPage = 5;
        $start = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($start > $rows_count) {
            return redirect('posts');
        }

        $posts = App::get('database')->selectAll('posts', $start, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);
        $pagination = true;

        return view('admin/gerenciamento-posts', compact('posts', 'page', 'total_pages', 'pagination'));
    }

    public function indexHome()
    {
        $posts = App::get('database')->selectAll('posts');
        return view('site/index', compact('posts'));
    }

    public function indexPosts()
    {
        $page = 1;

        if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
            $page = intval($_GET['pagina']);

            if ($page <= 0) {
                return redirect('galeria');
            }
        }

        $itensPage = 8;
        $start = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($start > $rows_count) {
            return redirect('galeria');
        }

        $posts = App::get('database')->selectAll('posts', $start, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);
        $pagination = true;

        return view('site/galeria', compact('posts', 'page', 'total_pages', 'pagination'));
    }

    public function indexUnique($id)
    {
        $postInd = (object) App::get('database')->find('posts', $id);

        if (!$postInd) {
            return redirect('');
        }

        $allPosts = App::get('database')->selectAll('posts');

        usort($allPosts, function ($a, $b) {
            return strtotime($b->date) - strtotime($a->date);
        });

        $lastTenPosts = array_filter(
            array_slice($allPosts, 0, 10),
            fn($post) => $post->id != $postInd->id
        );

        $matchingPosts = [];
        $nonMatchingPosts = [];

        foreach ($lastTenPosts as $post) {
            $categoriesCurrent = [$postInd->category1, $postInd->category2];
            $categoriesPost = [$post->category1, $post->category2];

            if (count(array_intersect($categoriesCurrent, $categoriesPost)) > 0) {
                $matchingPosts[] = $post;
            } else {
                $nonMatchingPosts[] = $post;
            }
        }

        shuffle($matchingPosts);
        shuffle($nonMatchingPosts);

        $recentPosts = array_slice($matchingPosts, 0, 3);

        if (count($recentPosts) < 3) {
            $recentPosts = array_merge(
                $recentPosts,
                array_slice($nonMatchingPosts, 0, 3 - count($recentPosts))
            );
        }

        return view('site/post-individual', compact('postInd', 'recentPosts'));
    }

    public function create()
    {
        $arquivo = $_FILES['image']['name'];
        $novoNome = uniqid();
        $pasta = 'public/img/';
        $extencao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $pasta . $novoNome . "." . $extencao
        );

        $parameters = [
            'title' => $_POST['title'],
            'summary' => $_POST['summary'],
            'content' => $_POST['content'],
            'author' => $_POST['author'],
            'date' => $_POST['date'],
            'category1' => $_POST['category1'],
            'category2' => $_POST['category2'] ?? null,
            'image' => $pasta . $novoNome . "." . $extencao,
            'image_alt' => $_POST['image_alt'],
            'image_source' => $_POST['image_source'],
        ];

        App::get('database')->insert('posts', $parameters);

        header('Location: /posts');
    }

    public function delete()
    {
        $post = App::get('database')->find('posts', $_POST['id']);

        $imagePath = $post['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        App::get('database')->delete('posts', $_POST['id']);

        header('Location: /posts');
    }

    public function update()
    {
        $post = App::get('database')->find('posts', $_POST['id']);
        $parameters = [];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

            if (file_exists($post['image'])) {
                unlink($post['image']);
            }

            $arquivo = $_FILES['image']['name'];
            $novoNome = uniqid();
            $pasta = 'public/img/';
            $extencao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

            $caminhoNovaImagem = $pasta . $novoNome . "." . $extencao;

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $caminhoNovaImagem
            );

            $parameters['image'] = $caminhoNovaImagem;
        }

        $parameters['title'] = $_POST['title'];
        $parameters['summary'] = $_POST['summary'];
        $parameters['content'] = $_POST['content'];
        $parameters['author'] = $_POST['author'];
        $parameters['date'] = $_POST['date'];
        $parameters['category1'] = $_POST['category1'];
        $parameters['category2'] = $_POST['category2'] ?? null;
        $parameters['image_alt'] = $_POST['image_alt'];
        $parameters['image_source'] = $_POST['image_source'];

        App::get('database')->edit('posts', $_POST['id'], $parameters);

        header('Location: /posts');
    }

    public function search()
    {
        $pesquisa = filter_input(INPUT_GET, 'search');

        $postsByTitle = App::get('database')->busca('posts', $pesquisa, 'title');
        $postsByAuthor = App::get('database')->busca('posts', $pesquisa, 'author');
        $postsByCategory1 = App::get('database')->busca('posts', $pesquisa, 'category1');
        $postsByCategory2 = App::get('database')->busca('posts', $pesquisa, 'category2');

        $posts = array_unique(
            array_merge($postsByTitle, $postsByAuthor, $postsByCategory1, $postsByCategory2),
            SORT_REGULAR
        );

        usort($posts, fn($a, $b) => strtotime($b->date) - strtotime($a->date));

        $pagination = false;

        return view("admin/gerenciamento-posts", compact('posts', 'pagination'));
    }

    public function searchPosts()
    {
        $pesquisa = trim(filter_input(INPUT_GET, 'search'));
        $categorias = $_GET['categorias'] ?? [];

        $normalizar = function ($texto) {
            $texto = strtolower($texto);
            return iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
        };

        $posts = App::get('database')->selectAll('posts');

        $posts = array_filter($posts, function ($post) use ($pesquisa, $categorias, $normalizar) {

            $matchPesquisa = true;
            $matchCategoria = true;

            if (!empty($pesquisa)) {

                $textoBusca = $normalizar($pesquisa);

                $campos = [
                    $post->title,
                    $post->author
                ];

                $matchPesquisa = false;

                foreach ($campos as $campo) {
                    if (str_contains($normalizar($campo), $textoBusca)) {
                        $matchPesquisa = true;
                        break;
                    }
                }
            }

            if (!empty($categorias)) {

                $categoriasPost = [
                    $post->category1,
                    $post->category2
                ];

                $matchCategoria = count(array_intersect($categorias, $categoriasPost)) > 0;
            }

            return $matchPesquisa && $matchCategoria;
        });

        usort($posts, fn($a, $b) => strtotime($b->date) - strtotime($a->date));

        $pagination = false;

        return view("site/galeria", compact('posts', 'pagination'));
    }

}

?>