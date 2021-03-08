<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_model_rsm extends CI_Model
{
    
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts=10 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_terkirim()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts=1 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at'";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_proses()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts <= 50 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_shop_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 40 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 60 AND is_active=1";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_selesai_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 70 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_tolak_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 80 AND is_active=1";
        return $this->db->query($query)->result_array();
    }




    public function list_permohonan_pimpinan()
    {
        $query = "SELECT * FROM at_atk  where sts = 20 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_lkk()
    {
        $query = "SELECT * FROM at_atk  where sts = 30 AND is_active=1";
        return $this->db->query($query)->result_array();
    }


}
