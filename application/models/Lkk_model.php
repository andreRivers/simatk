<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lkk_model extends CI_Model
{
    
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts = 3 AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at'";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_shop()
    {
        $query = "SELECT * FROM at_atk  where sts = 4 AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();


    }
    public function list_permohonan_sending()
    {
        $query = "SELECT * FROM at_atk  where sts = 5 AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan()
    {
        $query = "SELECT * FROM at_atk  where sts = 5 AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_shop_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at' AND sts=4";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_cetak($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at' AND sts=5";
        return $this->db->query($query)->row_array();
    }

    public function list_permohonan_selesai()
    {
        $query = "SELECT * FROM at_atk where sts = 7  AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }
    
}
