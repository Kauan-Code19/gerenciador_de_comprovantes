<?php

namespace App\Controllers;

use App\Models\ComprovanteModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ComprovanteInfo
{
    public $id;
    public $descricao;
    public $numero;
    public $url;
    public $valor;
    public $status;
    public $dataPagamento;
    public $dataVencimento;
    public $metodo;

    public function __construct($id, $descricao, $numero, $url, $valor, $status, $dataPagamento, $dataVencimento, $metodo) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->numero = $numero;
        $this->url = $url;
        $this->valor = $valor;
        $this->status = $status;
        $this->dataPagamento = $dataPagamento;
        $this->dataVencimento = $dataVencimento;
        $this->metodo = $metodo;
    }
}
class Comprovante extends BaseController
{
    
    public function index()
    {
        //  $model = model(ComprovanteModel::class);

        //  $Comprovantes = $model->findAll();
        $Comprovantes = array(
            new ComprovanteInfo(1, 'NF', 245789, 'boleto.pdf', 200.00, '', '02/08/2023', '1/08/2023', 'pix'),
            new ComprovanteInfo(2, 'NF', 913254, 'boleto.pdf', 300.00, '', '09/08/2023', '20/08/2023', 'cartao'),
            new ComprovanteInfo(3, 'NF', 556894, 'boleto.pdf', 400.00, '', '02/08/2023', '2/08/2023', 'pix'),
            new ComprovanteInfo(4, 'NF', 224378, 'boleto.pdf', 500.00, '', '05/08/2023', '20/08/2023', 'cartao'),
            new ComprovanteInfo(5, 'NF', 345674, 'boleto.pdf', 600.00, '', '07/08/2023', '1/08/2023', 'pix'),
            new ComprovanteInfo(6, 'NF', 213234, 'boleto.pdf', 700.00, '', '07/08/2023', '1/08/2023', 'cartao'),
            new ComprovanteInfo(7, 'NF', 233567, 'boleto.pdf', 800.00, '', '06/08/2023', '10/08/2023', 'pix'),
            new ComprovanteInfo(8, 'NF', 967217, 'boleto.pdf', 900.00, '', '06/08/2023', '10/08/2023', 'pix'),
        );

        // Define o status do comprovante como "vencido" ou "não vencido"
        $dataAtual = strtotime(date('Y-m-d'));

        foreach ($Comprovantes as $comprovante) {
            $dataVencimento = strtotime(str_replace('/', '-', $comprovante->dataVencimento));
            $comprovante->status = ($dataVencimento < $dataAtual) ? 'vencido' : 'nao-vencido';
        }

         $data = [
             'Comprovante'  => $Comprovantes,
             'title' => ucfirst('Comprovantes'),
         ];

         return view('templates/header', $data)
                 .view('Comprovante/index')
                 .view('templates/footer');

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

    public function cadastrar()
    {
        return view('templates/header', ['title' => 'Novo Comprovante'])
            . view('Comprovante/cadastro_comprovante')
            . view('templates/footer');
    }
}