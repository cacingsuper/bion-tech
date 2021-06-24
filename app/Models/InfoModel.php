<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table      = 'info';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    // protected $returnType    = 'App\Entities\Image';

    protected $allowedFields = ['id', 'ketua_ceo','wakil_ceo','address1','address2','email', 'telp1', 'telp2','since','employees','embed_map', 'visi_misi'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}