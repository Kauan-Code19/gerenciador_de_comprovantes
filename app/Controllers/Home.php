<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index($page = 'login')
    {
        helper('form');
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('templates/header', $data)
            .view('pages/'.$page)
            .view('templates/footer');
    }

    public function logar() {
        helper('form');
        $post = $this->request->getPost(['email', 'senha']);

        $model = model(UsuarioModel::class);

        $usuario = $model->where([
            'senha' => $post['senha'],
            'email'  => $post['email'],
        ])->first();

        var_dump($usuario);

        if(is_null($usuario))
        {
            return $this->response->redirect(base_url('/'));
        }

        $session = session();

        $ses_data = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email'],
            'isLoggedIn' => TRUE
        ];
        
        $session->set($ses_data);
        
        return $this->response->redirect(base_url('/usuario'));
    }
}
