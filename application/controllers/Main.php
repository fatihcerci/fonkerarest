<?php

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->load->view("main_page");
	}
	
}

