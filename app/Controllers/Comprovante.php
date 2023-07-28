<?php

namespace App\Controllers;

use App\Models\ComprovanteModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Comprovante extends BaseController
{
    public function index()
    {
        // $model = model(ComprovanteModel::class);

        // $Comprovantes = $model->findAll();
        // $data = [
        //     'Comprovante'  => $Comprovantes,
        //     'title' => ucfirst('Listagem de Usuários'),
        // ];

        // return view('templates/header', $data)
        //         .view('Comprovante/index')
        //         .view('templates/footer');

                return view('comprovante/index');
    }

    public function view($slug = null)
    {
        $model = model(ComprovanteModel::class);

        $data['Comprovante'] = $model->first($slug);
        $model = model(NewsModel::class);


        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}