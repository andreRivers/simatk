<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validator_permohonan_model extends CI_Model
{
    public function list_permohonan()
    {
        $query = "SELECT * FROM at_atk  where sts = 1 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_proses()
    {
        $query = "SELECT * FROM at_atk  where sts BETWEEN 2 AND 3 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }


    public function list_permohonan_shop()
    {
        $query = "SELECT * FROM at_atk  where sts=5 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }

    public function list_permohonan_pengambilan()
    {
        $query = "SELECT * FROM at_atk  where sts=6 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
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
        $query = "SELECT * FROM at_atk  where sts=7 AND is_active=1 GROUP BY username, created_at order by created_at ASC";
        return $this->db->query($query)->result_array();
    }



}