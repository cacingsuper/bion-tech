<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table      = 'media_upload';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    // protected $returnType    = 'App\Entities\Image';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'filename','oriname','path','alt','size', 'keterangan','mime_type', 'created_at', 'deleted_by'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}