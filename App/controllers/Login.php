<?php
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View,
\App\Models\User as Users,
\Core\Controller;

class Login extends Controller
{

	public function index()
	{ 
		View::set("title", "Login");
        View::render("login");
    }
}