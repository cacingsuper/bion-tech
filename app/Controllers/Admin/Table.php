<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\HTTP\RequestInterface;

class Table extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function our_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('our_business');

        $card_satu = [
            "list_data" => $builder->get()->getResult()
        ];
        
        $data = [
            "title" => "Table | Our Business",
            "breadcrumb" => ["Table", "Our Business"],
            "content" => (object)[
                "card_satu" => view("admin/pages/table/our-business", $card_satu),
                "card_dua" => NULL,
                "card_tiga" => NULL
            ]
        ];
        return view("admin/index", $data);
    }

    public function get_our_business(){
        $db      = \Config\Database::connect();
        $builder = $db->table('our_business');
        $builder->join('media_upload', 'media_upload.id = our_business.id_media_upload');
        $data    = $builder->get()->getResult();
        return $this->respond($data, 200);
    }

    public function post_our_business($id, $field){
        $request = \Config\Services::request();
        $input = $this->request->getPost("value");
        $db      = \Config\Database::connect();
        $builder = $db->table('our_business');
        $builder->where('id', $id);
        $builder->set($field, $input);
        $builder->set('updated_at', date("Y-m-d H:i:s"));
        $data    =  $builder->update();
        return $this->respond($data, 200);
    }
}
