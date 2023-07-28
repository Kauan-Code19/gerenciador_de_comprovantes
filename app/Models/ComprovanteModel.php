<?php

namespace App\Models;

use CodeIgniter\Model;

class ComprovanteModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nome', 'email'];
}
