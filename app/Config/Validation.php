<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $register = [
		'username' => 'required|alpha_numeric|min_length[5]|max_length[20]',
		'email' => 'required|valid_email',
		'password' => 'required|min_length[8]|max_length[20]'
	];

	public $register_errors = [
		'username' => [
			'required'      => 'Username wajib diisi',
			'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka',
			'min_length'    => 'Username minimal terdiri dari 5 karakter',
			'max_length'    => 'Username maksimal terdiri dari 20 karakter'
		],
		'email' => [
			'required'          => 'Email wajib diisi',
			'email.valid_email' => 'Email tidak valid'
		],
		'password' => [
			'required'      => 'Password wajib diisi',
			'min_length'    => 'Password minimal terdiri dari 8 karakter',
			'max_length'    => 'Password maksimal terdiri dari 20 karakter'
		]
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
