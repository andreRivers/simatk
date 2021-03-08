<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Lkk_model');
    }

    public function tagihanKampus()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_tagihan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/tagihan', $data);

    }

    public function unlist($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $tagihan = 1;

        $log = [
            'username' =>  $this->session->userdata('username'),
            'log' => "LKK Memasukan Tagihan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('tagihan', $tagihan);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Behasil Memasukan Tagihan !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
    }

    
    public function invoice()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_tagihan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/cInvoice', $data);
        $this->load->view('templates/footer', $data);

    }


    public function lunas()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $tagihan = 3;
        $syarat=2;
        $date = date("Y-m-d H:i:s");

        $log = [
            'username' =>  $this->session->userdata('username'),
            'log' => "LKK MELUNASI Tagihan Dengan",
            'created_at' => time()
        ];

        $this->db->set('tagihan', $tagihan);
        $this->db->set('date_lunas', $date);
        $this->db->where('tagihan', $syarat);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Tagihan Telah Lunas !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
    }





}
