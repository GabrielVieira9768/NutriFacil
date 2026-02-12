<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    public function index()
    {
        $page = 1;

        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);

            if($page <= 0){
                return redirect('usuarios');
            }
        }

        $itensPage = 5;
        $start = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('users');

        if($start > $rows_count)
        {
            return redirect('usuarios');
        }

        $users = App::get('database')->selectAll('users', $start, $itensPage);
        $total_pages = ceil($rows_count/$itensPage);
        $pagination = true;

        return view('admin/gerenciamento-usuarios', compact('users','page','total_pages', 'pagination'));
    }

    public function create()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'cpf' => $_POST['cpf'],
            'phone' => $_POST['phone'],
        ];

        App::get('database')->insert('users', $parameters);

        header('Location: /usuarios');
    }

    public function update()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'cpf' => $_POST['cpf'],
            'phone' => $_POST['phone'],
        ];
        
        app::get('database')->edit('users', $_POST['id'], $parameters);

        header('Location: /usuarios');
    }

    public function delete()
    {
        App::get('database')->delete('users', $_POST['id']);
        header('Location: /usuarios');
    }

    public function search()
    {
        $pesquisa = filter_input(INPUT_GET,'search');

        $users = App::get('database')->busca('users', $pesquisa, 'name');

        $pagination = false;

        return view("admin/gerenciamento-usuarios", compact('users', 'pagination'));
    }

    public function indexDashboard()
    {
        $db = App::get('database');

        try {

            $categories_map = [
                "actividade-fisica" => "Atividade física",
                "alimentacao" => "Alimentação saudável",
                "alimentacao-esportiva" => "Alimentação esportiva",
                "alimentacao-infantil" => "Nutrição infantil",
                "bem-estar" => "Bem-estar",
                "curiosidades" => "Curiosidades",
                "dicas" => "Dicas práticas",
                "educacao" => "Educação nutricional",
                "fitoterapia" => "Fitoterapia",
                "ganho-de-massa" => "Ganho de massa",
                "hidratação" => "Hidratação",
                "perda-de-peso" => "Perda de peso",
                "planejamento" => "Planejamento",
                "receitas" => "Receitas",
                "saude-mental" => "Saúde mental",
                "suplementos" => "Suplementos"
            ];

            $rawCategories = $db->raw("
                SELECT categoria, COUNT(*) AS total
                FROM (
                    SELECT category1 AS categoria FROM posts
                    WHERE category1 IS NOT NULL AND category1 != ''

                    UNION ALL

                    SELECT category2 FROM posts
                    WHERE category2 IS NOT NULL AND category2 != ''
                ) AS categorias
                GROUP BY categoria
            ");

            $categoryCounts = [];

            foreach ($rawCategories as $cat) {
                $categoryCounts[$cat->categoria] = (int) $cat->total;
            }

            foreach ($categories_map as $slug => $name) {
                if (!isset($categoryCounts[$slug])) {
                    $categoryCounts[$slug] = 0;
                }
            }

            arsort($categoryCounts);
            $topCategories = array_slice($categoryCounts, 0, 3, true);

            asort($categoryCounts);
            $lowCategories = array_slice($categoryCounts, 0, 3, true);

            $topCategories = array_map(function ($slug, $total) {
                return (object)[
                    'categoria' => $slug,
                    'total' => $total
                ];
            }, array_keys($topCategories), $topCategories);

            $lowCategories = array_map(function ($slug, $total) {
                return (object)[
                    'categoria' => $slug,
                    'total' => $total
                ];
            }, array_keys($lowCategories), $lowCategories);

            $lastMonth = $db->raw("
                SELECT COUNT(*) AS total
                FROM posts
                WHERE date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
            ");

            $lastMonthPosts = $lastMonth[0]->total ?? 0;

            $topUsers = $db->raw("
                SELECT author, COUNT(*) AS total
                FROM posts
                GROUP BY author
                ORDER BY total DESC
                LIMIT 3
            ");

            $users = $db->selectAll('users');
            $posts = $db->selectAll('posts');

            return view(
                'admin/area-administrativa',
                compact(
                    'users',
                    'posts',
                    'topCategories',
                    'lowCategories',
                    'lastMonthPosts',
                    'topUsers'
                )
            );

        } catch (Exception $e) {
            die("Erro ao carregar dashboard: " . $e->getMessage());
        }
    }

}

?>