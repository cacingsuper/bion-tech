<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Files\UploadedFile;

class Image extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->session = session();
        $this->imageModel = new \App\Models\ImageModel();
        $this->media_uploads = $this->imageModel->findAll();
        $this->board_directors = \Config\Database::connect()->table('board_directors');
        $this->request = \Config\Services::request();
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
        return view("admin/index", $data);
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
                "card_satu" => view("admin/pages/image/gallery", $card_satu),
                "card_dua"  => ""
            ],

        ];
        return view("admin/index", $data);
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
    public function media_upload()
    {
        $data = $this->media_uploads;
        return $this->respond($data, 200);
    }
    public function post_media_upload()
    {
        $file = $this->request->getFile("media_upload");
        $filename = $file->getRandomName();
        $originalName = $file->getClientName();
        $data = [
            'oriname'   => $originalName,
            'filename'  => $filename,
            'path'      => "/img/" . $filename,
            'mime_type' => $file->getMimeType(),
            'size'      => $file->getSize(),
            'created_at' => date("Y-m-d H:i:s")
        ];
        if ($file->isValid()) {
            $file->move(ROOTPATH . 'public/img', $filename);
            $this->imageModel->insert($data);
            return $this->respondCreated($data);
        } else {
            $error = [
                'error' => throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')')
            ];
            return $this->respond($error, 400);
        }
    }

    public function url_upload()
    {
        $image_url = $this->request->getBody();
        $link_array = explode('/', $image_url);
        $filename = end($link_array);
        $data = [
            'oriname'   => $filename,
            'filename'  => $filename,
            'path'      => $image_url,
            'mime_type' => "image/jpg",
            'size'      => 10,
            'created_at' => date("Y-m-d H:i:s")
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
                "card_satu" => view("admin/pages/image/director", $card_satu),
                "card_dua"  => ""
            ],

        ];
        return view("admin/index", $data);
    }

    public function image_url()
    {
        $card_satu = [
            'list_image' => $this->media_uploads
        ];
        $data = [
            "title" => "Images",
            "breadcrumb" => ["Images", "Gallery"],
            "content" => (object)[
                "menu"      => "",
                "card_satu" => view("admin/pages/image/url", $card_satu),
                "card_dua"  => ""
            ],

        ];
        return view("admin/index", $data);
    }

    public function delete_media_upload(){
        $deleted_by = session()->get('username');
        $id = $this->request->getVar("id");
        $this->imageModel->update($id, ["deleted_by" => $deleted_by]);
        $this->imageModel->delete($id);
        // Item successfully deleted
        $data = [
            "message" => "delete success",
            "deleted_by" => $deleted_by
        ];
        return $this->respondDeleted($data);
    }
}
