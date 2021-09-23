<?php
defined('BASEPATH') or exit('Acesso não permitido');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }

}
