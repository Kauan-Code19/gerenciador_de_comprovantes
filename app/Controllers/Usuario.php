<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Usuario extends BaseController
{
    public function index()
    {
        $model = model(UsuarioModel::class);

        $usuarios = $model->findAll();
        $data = [
            'usuario'  => $usuarios,
            'title' => ucfirst('Listagem de Usuários'),
        ];

        return view('templates/header', $data)
                .view('usuario/index')
                .view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(UsuarioModel::class);

        $data['usuario'] = $model->first($slug);
        $model = model(NewsModel::class);


        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function cadastro()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Criar usuário'])
                . view('usuario/cadastro')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['nome', 'email']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'nome' => 'required|max_length[255]|min_length[3]',
            'email'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Criar usuário'])
                . view('usuario/cadastro')
                . view('templates/footer');
        }

        $model = model(UsuarioModel::class);

        $model->save([
            'nome' => $post['nome'],
            'email'  => $post['email'],
        ]);

        return view('templates/header', ['title' => 'Criar usuário'])
            . view('usuario/success')
            . view('templates/footer');
    }
}