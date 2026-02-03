<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function index()
    {
        $page = 1;

        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);

            if($page <= 0){
                return redirect('posts');
            }
        }

        $itensPage = 5;
        $start = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if($start > $rows_count)
        {
            return redirect('posts');
        }

        $posts = App::get('database')->selectAll('posts', $start, $itensPage);
        $total_pages = ceil($rows_count/$itensPage);
        $pagination = true;

        return view('admin/gerenciamento-posts', compact('posts','page','total_pages', 'pagination'));
    }

    public function indexHome()
    {
        $posts = App::get('database')->selectAll('posts');
        return view('site/index', compact('posts'));
    }

    public function indexPosts()
    {
        $page = 1;

        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);

            if($page <= 0){
                return redirect('posts');
            }
        }

        $itensPage = 8;
        $start = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if($start > $rows_count)
        {
            return redirect('posts');
        }

        $posts = App::get('database')->selectAll('posts', $start, $itensPage);
        $total_pages = ceil($rows_count/$itensPage);
        $pagination = true;

        return view('site/galeria', compact('posts','page','total_pages', 'pagination'));
    }

    public function indexUnique()
    {
        $post = (object)App::get('database')->find('posts', $_POST['id']);

        return view('site/post-individual', compact('post'));
    }

    public function create()
    {
        $arquivo = $_FILES['image']['name'];
        $novoNome = uniqid();
        $pasta = 'public/img/';
        $extencao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['image']['tmp_name'], $pasta . $novoNome . "." . $extencao);

        $parameters = [
            'title' => $_POST['title'],
            'image' => $pasta . $novoNome . "." . $extencao,
            'content' => $_POST['content'],
            'author' => $_POST['author'],
            'date' => $_POST['date'],
        ];

        App::get('database')->insert('posts',$parameters);
        header('location: /posts');
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

        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $arquivo = $_FILES['image']['name'];

            $imagePath = $post['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $novoNome = uniqid();
            $pasta = 'public/img/';
            $extencao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
            $caminhoNovaImagem = $pasta . $novoNome . "." . $extencao;
            move_uploaded_file($_FILES['image']['tmp_name'], $caminhoNovaImagem);

            $parameters['image'] = $caminhoNovaImagem;
        }

        $parameters['title'] = $_POST['title'];
        $parameters['content'] = $_POST['content'];
        $parameters['author'] = $_POST['author'];
        $parameters['date'] = $_POST['date'];

        App::get('database')->edit('posts', $_POST['id'], $parameters);

        header('Location: /posts');
    }

    public function search()
    {
        $pesquisa = filter_input(INPUT_GET,'search');

        $postsByTitle = App::get('database')->busca('posts', $pesquisa, 'title');
        $postsByAuthor = App::get('database')->busca('posts', $pesquisa, 'author');
        $posts = array_unique(array_merge($postsByTitle, $postsByAuthor), SORT_REGULAR);

        $pagination = false;

        return view("admin/gerenciamento-posts", compact('posts', 'pagination'));
    }

    public function searchPosts()
    {
        $pesquisa = filter_input(INPUT_GET,'search');

        $postsByTitle = App::get('database')->busca('posts', $pesquisa, 'title');
        $postsByAuthor = App::get('database')->busca('posts', $pesquisa, 'author');
        $posts = array_unique(array_merge($postsByTitle, $postsByAuthor), SORT_REGULAR);

        $pagination = false;

        return view("site/galeria", compact('posts', 'pagination'));
    }
}

?>