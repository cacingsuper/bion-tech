<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Image extends BaseController
{
	public function __construct(){
		$this->session = session();
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
        $data = [
            "title" => "Images",
            "content" => (object)[
                "card_satu" => view("admin/pages/image/gallery"),
                "card_dua"  => ""
            ],

        ];
		return view("admin/index" , $data);
    }
}
