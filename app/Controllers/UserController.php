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
        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');

        return view("admin/dashboard", compact('users', 'posts'));
    }
}

?>