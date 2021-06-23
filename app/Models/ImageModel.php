<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table      = 'media_upload';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $returnType    = 'App\Entities\Image';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'filename','path','alt','size', 'keterangan'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}