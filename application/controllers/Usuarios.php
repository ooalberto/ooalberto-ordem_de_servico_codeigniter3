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
            'strTitulo' =>   'Usuários',
            'arrStyles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),
            'arrScripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'objUsuarios' =>  $this->ion_auth->users()->result(),
        );

        $this->load->view('layout/header', $arrData);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
}
