<?php

namespace App\Controllers;

use App\Models\ComprovanteModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Comprovante extends BaseController
{
    
    public function index()
    {
        $model = model(ComprovanteModel::class);

        $session = session();
        $userId = $session->get('id');

        $Comprovantes = $model->where('id_usuario', $userId)->findAll();

         $data = [
             'Comprovante'  => $Comprovantes,
             'title' => ucfirst('Comprovantes'),
         ];

         return view('templates/header', $data)
                 .view('comprovante/index')
                 .view('templates/footer');

                return view('comprovante/index');
    }

    public function view($slug = null)
    {
        $model = model(ComprovanteModel::class);

        $data['Comprovante'] = $model->first($slug);
        $model = model(ComprovanteModel::class);


        if (empty($data['Comprovante'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function cadastrar()
    {
        helper('form');
        return view('templates/header', ['title' => 'Novo Comprovante'])
            . view('comprovante/cadastro_comprovante')
            . view('templates/footer');
    }

    public function salvar()
    {
        $post = $this->request->getPost(['descricao', 'numero', 'valor', 'data_pagamento', 'data_vencimento', 'metodo']);
    
        if (!$this->validateData($post, ['descricao' => 'required|max_length[255]|min_length[3]','numero' => 'required|numeric','valor' => 'required|numeric','data_vencimento' => 'required','metodo' => 'required'])) {
            return view('templates/header', ['title' => 'Novo Comprovante'])
                . view('comprovante/cadastro_comprovante')
                . view('templates/footer');
        }
    
        $model = model(ComprovanteModel::class);

        $session = session();
        $userId = $session->get('id');

        $data = [
            'descricao' => $post['descricao'],
            'numero' => $post['numero'],
            'valor' => $post['valor'],
            'data_pagamento' => $post['data_pagamento'],
            'data_vencimento' => $post['data_vencimento'],
            'metodo' => $post['metodo'],
            'status' => (!empty($post['data_pagamento'])) ? 'pago' : 'nao-pago',
            'id_usuario' => $userId
        ];


        // Manipule o upload do arquivo
        $file = $this->request->getFile('comprovante');
    
        // Verifique se o upload foi bem-sucedido
        if ($file->isValid() && !$file->hasMoved()) {
            // Mova o arquivo para o diretório desejado
            $newName = $file->getRandomName();
            $uploadPath = UPLOAD_PATH;
            $file->move($uploadPath, $newName);
            $data['comprovante_img'] = $newName;
        }

        $extensao = pathinfo($newName, PATHINFO_EXTENSION);
        $data['extensao'] = '.'.$extensao;
    
        // Salve os dados no banco de dados
        $model->save($data);
    
        return redirect()->to('comprovante');
    }

    public function upload($comprovanteId) {
        $model = model(ComprovanteModel::class);

        $comprovante = $model->find($comprovanteId);

        if (empty($comprovante)) {
            throw new PageNotFoundException('Comprovante não encontrado: ' . $comprovanteId);
        }

        $filePath = UPLOAD_PATH . $comprovante['comprovante_img'];

        if (!file_exists($filePath)) {
            throw new PageNotFoundException('Arquivo do comprovante não encontrado: ' . $comprovante['comprovante_img']);
        }

        $extensao = $comprovante['extensao'];
        $guid = com_create_guid();

        return $this->response->download($filePath, null)->setFileName($guid.$extensao);
    }

    public function edicao($comprovanteId) {
        helper('form');

        $model = model(ComprovanteModel::class);

        $data = [
            'comprovante' => $model->where('id', $comprovanteId)->first(),
            'title' => ucfirst('Edição de Comprovantes')
        ];

        return view('templates/header', $data)
            .   view('comprovante/edicao_comprovante')
            .   view('templates/footer');
    }

    public function atualizar()
    {
        $post = $this->request->getPost(['id', 'descricao', 'numero', 'valor', 'data_pagamento', 'data_vencimento', 'metodo']);

        $model = model(ComprovanteModel::class);

        $comprovante = $model->find($post['id']);
    
        $file = $this->request->getFile('comprovante');

        if ($file->isValid() && !$file->hasMoved()) {
            $oldFilePath = UPLOAD_PATH . $comprovante['comprovante_img'];
            unlink($oldFilePath);
            
            $newName = $file->getRandomName();
            $file->move(UPLOAD_PATH, $newName);

            $comprovante['comprovante_img'] = $newName;
        }

        $extensao = pathinfo($newName, PATHINFO_EXTENSION);
        $comprovante['extensao'] = '.'.$extensao;

        $model->update(
            $post['id'],
            [
                'descricao' => $post['descricao'],
                'numero' => $post['numero'],
                'valor' => $post['valor'],
                'data_pagamento' => $post['data_pagamento'],
                'data_vencimento' => $post['data_vencimento'],
                'metodo' => $post['metodo'],
                'comprovante_img' => $comprovante['comprovante_img'],
                'extensao' => $comprovante['extensao']
            ]
        );

        return $this->response->redirect(base_url('comprovante'));
    }

    public function deletar($id) {
        $model = model(ComprovanteModel::class);

        $comprovante = $model->find($id);

        $filePath = UPLOAD_PATH . $comprovante['comprovante_img'];
        unlink($filePath);

        $model->where('id', $id)->delete($id);

        return $this->response->redirect(base_url('comprovante'));
    }
}