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
        } else {
            return FALSE;
        }
    }


    public function get_by_id($tabela = null, $condicao = null)
    {
        if ($tabela && is_array($condicao)) {
            $this->db->where($condicao);
            $this->db->limit(1);

            return $this->db->get($tabela)->row();
        }
    }

    public function insert($tabela = null, $data = null, $get_last_id = null)
    {
        if ($tabela &&  is_array($data)) {
            $this->db->insert($tabela, $data);
            if ($get_last_id) {
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->sesson->set_flashdata('error', 'Erro ao salvar dados no banco');
            }
        }
    }

    public function update($tabela = null, $data = null, $condicao = null)
    {
        if ($tabela && is_array($data) && is_array($condicao)) {
            if ($this->db->update($tabela, $data, $condicao)) {
                $this->sesson->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Erro ao atualizar os dados');
            }
        } else {
            return FALSE;
        }
    }

    public function delete($tabela  = null, $condicao = null)
    {
        $this->db->db_debug =  FALSE;

        if ($tabela && is_array($condicao)) {
            $status = $this->db->delete($tabela, $condicao);
            $error = $this->db->error();
            if (!$status) {
                foreach ($error as $code) {
                    if ($code == 1451) {
                        $this->session->set_flashdata('error', 'Esse registro não pode ser usado, pois esta sendo usado em outra tabela.');
                    }
                }
            } else {
                $this->session->set_flashdata('success', 'Registro excluído com sucesso!');
            }
            $this->db->db_debug =  FALSE;
        } else {
            return FALSE;
        }
    }
}
