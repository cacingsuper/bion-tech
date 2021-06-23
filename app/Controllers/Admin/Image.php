<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Image extends BaseController
{
	public function __construct(){
		$this->session = session();
        $imageModel = new \App\Models\ImageModel();
		$this->media_upload = $imageModel->findAll();
	}
	public function index()
	{
        $data = [
            "title" => "Images",
            "content" => [
                "card_satu" => "",
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);
	}

    public function gallery()
    {
        $list_image = $this->media_upload;
        dd($list_image);
        $data = [
            "title" => "Images",
            "content" => (object)[
                "menu"      => view("admin/pages/image/menu"),
                "card_satu" => view("admin/pages/image/gallery"),
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);
    }
}
