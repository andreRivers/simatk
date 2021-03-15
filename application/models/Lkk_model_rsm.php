<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lkk_model_rsm extends CI_Model
{
    
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts=30 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at'";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_shop()
    {
        $query = "SELECT * FROM at_atk  where sts=40 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();


    }
    public function list_permohonan_sending()
    {
        $query = "SELECT * FROM at_atk  where sts=50 AND is_active = 1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan()
    {
        $query = "SELECT * FROM at_atk  where sts=50 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_shop_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at' AND sts=40";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_cetak($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at' AND sts=50";
        return $this->db->query($query)->row_array();
    }

    public function list_permohonan_selesai()
    {
        $query = "SELECT * FROM at_atk where is_active =1 AND sts BETWEEN 60 AND 70 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_invoice()
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND tagihan=20 order by id_atk ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_tagihan()
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND tagihan=20 order by id_atk ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_laporan_cetak($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT * FROM at_atk where is_active=1 AND tagihan=3 AND date_lunas BETWEEN $tgl_awal AND $tgl_akhir";
        return $this->db->query($query)->row_array();
    }
    
}


