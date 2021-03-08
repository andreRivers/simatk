<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validator_permohonan_model_rsm extends CI_Model
{
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts=10 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_proses()
    {
        $query = "SELECT * FROM at_atk  where sts BETWEEN 20 AND 30 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_shop()
    {
        $query = "SELECT * FROM at_atk  where sts=40 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_sending()
    {
        $query = "SELECT * FROM at_atk  where sts =50 AND is_active =1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan()
    {
        $query = "SELECT * FROM at_atk  where sts=60 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_detail($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at'";
        return $this->db->query($query)->result();
    }

        public function list_serahTerima($username, $created_at)
    {
        $query = "SELECT * FROM at_atk  where is_active=1 AND username='$username' AND created_at='$created_at'";
        return $this->db->query($query)->row_array();
    }

    function save_tandaTerima($username, $created_at, $sts, $date_selesai, $file, $img)
    {
        $hasil = $this->db->query("UPDATE at_atk SET ttd='$file', base64='$img', sts='$sts', date_selesai='$date_selesai' WHERE username='$username' AND created_at='$created_at'");
    }

     public function list_permohonan_selesai()
    {
        $query = "SELECT * FROM at_atk  where sts=70 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    



}