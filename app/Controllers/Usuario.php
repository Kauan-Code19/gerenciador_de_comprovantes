<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Usuario extends BaseController
{
    public function telaDeListagem()
    {

        $model = model(UsuarioModel::class);

        $usuarios = $model->orderBy('id', 'DESC')->findAll();
        $data = [
            'usuario'  => $usuarios,
            'title' => ucfirst('Listagem de Usuários'),
        ];

        return view('templates/header', $data)
                .view('usuario/index')
                .view('templates/footer');
    }

    public function telaDeDetalhe($id)
    {
        helper('form');

        $model = model(UsuarioModel::class);

        $data = [
            'usuario'  => $model->where('id', $id)->first(),
            'title' => ucfirst('Edição de Usuários'),
        ];

        return view('templates/header', $data)
            . view('usuario/edicao')
            . view('templates/footer');
    }

    public function telaDeCadastro()
    {
        helper('form');
        return view('templates/header', ['title' => 'Criar usuário'])
            . view('usuario/cadastro')
            . view('templates/footer');
    }

    public function salvar() {
        $post = $this->request->getPost(['nome', 'email', 'password']);

        if (! $this->validateData($post, [
            'nome' => 'required|max_length[255]|min_length[3]',
            'email'  => 'required|max_length[5000]|min_length[10]',
            'password' => 'required|max_length[255]|min_length[3]'
        ]))
        {
            return view('templates/header', ['title' => 'Criar usuário'])
                . view('usuario/cadastro')
                . view('templates/footer');
        }

        $model = model(UsuarioModel::class);

        $model->save([
            'nome' => $post['nome'],
            'email'  => $post['email'],
            'senha' => $post['password']
        ]);

        return $this->response->redirect(base_url('/usuario'));
    }

    public function atualizar()
    {
        $post = $this->request->getPost(['id', 'nome', 'email', 'password']);


        var_dump($post);

        $model = model(UsuarioModel::class);

        $model->update(
            $post['id'],
            [
                'nome' => $post['nome'],
                'email'  => $post['email'],
                'senha'  => $post['password'],
            ]
        );

        return $this->response->redirect(base_url('/usuario'));
    }

    public function deletar($id)
    {
        $model = model(UsuarioModel::class);

        $model->where('id', $id)->delete($id);
        
        return $this->response->redirect(base_url('/usuario'));
    }
}