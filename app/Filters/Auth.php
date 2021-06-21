<?php 

namespace App\Filters;

use Codeigniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
        if(!session()->get('logged_in') && session()->get('role') !== "1"){
            return redirect()->to('/');
        }
    }
        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
        // Do something here
    }
}