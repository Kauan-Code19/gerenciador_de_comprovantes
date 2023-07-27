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
}