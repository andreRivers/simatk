<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_model extends CI_Model
{
    
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts = 1 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
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
        $query = "SELECT * FROM at_atk where username='$username' AND sts <= 5 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_shop_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 4 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 6 AND is_active=1";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_selesai_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 7 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_tolak_user()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT * FROM at_atk where username='$username' AND sts = 8 AND is_active=1";
        return $this->db->query($query)->result_array();
    }




    public function list_permohonan_pimpinan()
    {
        $query = "SELECT * FROM at_atk  where sts = 2 AND is_active=1";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_lkk()
    {
        $query = "SELECT * FROM at_atk  where sts = 3 AND is_active=1";
        return $this->db->query($query)->result_array();
    }


}
