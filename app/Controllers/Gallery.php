<?php

namespace App\Controllers;

class Gallery extends BaseController
{
	public function index()
	{
		return view('pages/gallery');
	}
}
