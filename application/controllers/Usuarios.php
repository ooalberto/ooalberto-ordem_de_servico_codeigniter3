<?php

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arrData = array(
            'objUsuarios' =>  $this->ion_auth->users()->result(),
        );
        // echo '<pre>';
        // print_r($arrData);
        $this->load->view('layout/header',$arrData);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
}
