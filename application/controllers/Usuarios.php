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
                'vendor/datatables/app.js',
                //  'js/demo/datatables-demo.js'
            ),
            'objUsuarios' =>  $this->ion_auth->users()->result(),
        );

        $this->load->view('layout/header', $arrData);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer', $arrData);
    }

    public function edit($intUserId = NULL)
    {
        if (!$intUserId || !$this->ion_auth->user($intUserId)->row()) {

            exit('Usuário não encontrado');
        } else {

            $arrData = array(
                'strTitulo' =>   'Editar Usuários',
                'objUsuario' => $this->ion_auth->user($intUserId)->row()
            );

            // echo '<pre>';
            // print_r($arrData['objUsuario']);
            // echo '</pre>';
            // exit;

            $this->load->view('layout/header', $arrData);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer', $arrData);
        }
    }
}
