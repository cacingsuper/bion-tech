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
        $this->board_directors = \Config\Database::connect()->table('board_directors');
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

    public function board_directors()
    {
        $card_satu = [
            "list_persons" => $this->board_directors->get()->getResult()
        ];
        $data = [
            "title" => "Board Of Directors",
            "breadcrumb" => ["Images", "Board Of Directors"],
            "content" => (object)[
                // "menu"      => view("admin/pages/image/menu"),
                "card_satu" => view("admin/pages/image/director" ,$card_satu),
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);   
    }
}
