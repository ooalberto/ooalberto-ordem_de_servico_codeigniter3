<?php

defined('BASEPATH') or exit('Ação não permitida');

class Core_model extends CI_Model
{
    public function get_all($tabela = NULL, $condicao = NULL)
    {
        if ($tabela) {
            if (is_array($condicao)) {
                $this->db->where($condicao);
            }
            return $this->db->get($tabela)->result();
        }else{
            return FALSE;
        }
    }
}
