<?php

namespace App\Models;

use CodeIgniter\Model;

class ComprovanteModel extends Model
{
    protected $table = 'comprovantes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_usuario','tipo', 'descricao', 'numero', 'data_vencimento', 'data_pagamento', 'valor', 'status','metodo', 'comprovante_img', 'extensao'];
}
