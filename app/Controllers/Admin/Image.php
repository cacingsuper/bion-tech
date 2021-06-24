<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;


class Image extends BaseController
{
    use ResponseTrait;

	public function __construct(){
		$this->session = session();
        $this->imageModel = new \App\Models\ImageModel();
		$this->media_uploads = $this->imageModel->findAll();
	}
    
	public function index()
	{
        $data = [
            "title" => "Images",
            "breadcrumb" => ["Images", ""],
            "content" => [
                "card_satu" => "",
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);
	}

    public function gallery()
    {
        $card_satu = [
            'list_image' => $this->media_uploads 
        ];
        $data = [
            "title" => "Images",
            "breadcrumb" => ["Images", "Gallery"],
            "content" => (object)[
                "menu"      => view("admin/pages/image/menu"),
                "card_satu" => view("admin/pages/image/gallery" , $card_satu),
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);
    }

    public function upload_gallery()
    {
        $data = [
            'filename'  => 'default.png',
            'path'      => '/img/default.png',
            'mime_type' => 'image/jpg',
            'size'      => 20
        ];
        $this->imageModel->insert($data);
        return $this->respondCreated($data);
    }
}
