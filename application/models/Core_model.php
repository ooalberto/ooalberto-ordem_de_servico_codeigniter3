<?php

defined('BASEPATH') or exit('Ação não permitida');

class Core_model extends CI_Model
{
    public function get_all($strTabela = NULL, $arrCondicao = NULL)
    {
        if ($strTabela) {
            if (is_array($arrCondicao)) {
                $this->db->where($arrCondicao);
            }
            return $this->db->get($strTabela)->result();
        } else {
            return FALSE;
        }
    }


    public function get_by_id($strTabela = null, $arrCondicao = null)
    {
        if ($strTabela && is_array($arrCondicao)) {
            $this->db->where($arrCondicao);
            $this->db->limit(1);

            return $this->db->get($strTabela)->row();
        }
    }

    public function insert($strTabela = null, $strData = null, $intGetLastId = null)
    {
        if ($strTabela &&  is_array($strData)) {
            $this->db->insert($strTabela, $strData);
            if ($intGetLastId) {
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->sesson->set_flashdata('error', 'Erro ao salvar dados no banco');
            }
        }
    }

    public function update($strTabela = null, $strData = null, $arrCondicao = null)
    {
        if ($strTabela && is_array($strData) && is_array($arrCondicao)) {
            if ($this->db->update($strTabela, $strData, $arrCondicao)) {
                $this->sesson->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Erro ao atualizar os dados');
            }
        } else {
            return FALSE;
        }
    }

    public function delete($strTabela  = null, $arrCondicao = null)
    {
        $this->db->db_debug =  FALSE;

        if ($strTabela && is_array($arrCondicao)) {
            $intStatus = $this->db->delete($strTabela, $arrCondicao);
            $arrError = $this->db->error();
            if (!$intStatus) {
                foreach ($arrError as $intCode) {
                    if ($intCode == 1451) {
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
