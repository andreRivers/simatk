<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_atk_rsm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Permohonan_model_rsm');
    }


    public function setuju($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $sts = 30;
        $date_pimpinan = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => " Pimpinan Setuju permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('sts', $sts);
        $this->db->set('date_pimpinan', $date_pimpinan);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Anda Berhasil menyetujui !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
    }

    public function tolakGo()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $id_atk = $this->input->post('id_atk');
        $sts = 70;
        $komentar = $this->input->post('komentar');
        $date_pimpinan = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => " validator Menolak permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('komentar', $komentar);
        $this->db->set('sts', $sts);
        $this->db->set('date_pimpinan', $date_pimpinan);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Berhasil ditolak !
          </div>');
        redirect('pimpinan/permohonan_atk_rsm/proses');
    }


    public function proses()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model_rsm->list_permohonan_pimpinan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/proses', $data);
        $this->load->view('templates/footer');
    }

    public function shop()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->db->get_where('at_atk', ['username' => $this->session->userdata('username'), 'sts' => 3, 'is_active' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/shop', $data);
        $this->load->view('templates/footer');
    }

    public function pengambilan()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->db->get_where('at_atk', ['username' => $this->session->userdata('username'), 'sts' => 4, 'is_active' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/pengambilan', $data);
        $this->load->view('templates/footer');
    }

    public function selesai()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->db->get_where('at_atk', ['username' => $this->session->userdata('username'), 'sts' => 5, 'is_active' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function tolak()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->db->get_where('at_atk', ['username' => $this->session->userdata('username'), 'sts' => 6, 'is_active' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/ditolak', $data);
        $this->load->view('templates/footer');
    }
}
