<?php

namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "About",
			"page" 	=> "about"
		];
		return view('pages/about-us', $data);
	}
	public function company_overview(){
		$data = [
			"title" => "Company Overview",
			"page" 	=> "company"
		];
		return view('pages/about-us/company-overview', $data);
	}
	public function board_directors()
	{
		$data = [
			"title" => "Board Of Directors",
			"page"  => "bod"
		];
		return view('pages/about-us/board-of-directors', $data);
	}
	public function senior_management()
	{
		$data = [
			"title" => "Senior Management",
			"page"	=> "senior-managament"
		];
		return view('pages/about-us/senior-management', $data);
	}
	
}
