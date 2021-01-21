<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_atk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Permohonan_model');
    }

    public function input()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->db->get('at_satuan')->result_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permohonan_atk/input', $data);
            $this->load->view('templates/footer');
        } else {
            $atk = [
                'username' =>  $this->session->userdata('username'),
                'nama_barang' => $this->input->post('nama_barang'),
                'merek' => $this->input->post('merek'),
                'type' => $this->input->post('type'),
                'jumlah' => $this->input->post('jumlah'),
                'satuan' => $this->input->post('satuan'),
                'ket' => $this->input->post('ket'),
                'sts' => 1,
                'is_active' => 1,
                'tanda' => 0,
                'created_at' => date("Y-m-d H:i:s")
            ];

            $log = [
                'username' => $this->input->post('username'),
                'log' => "Membuat Permohonan.",
                'created_at' => time()
            ];

            $this->db->insert('at_atk', $atk);
            $this->db->insert('at_log', $log);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Sudah Akan Kami Proses !
          </div>');
            redirect('permohonan_atk/terkirim');
        }
    }

    public function edit($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->db->get('at_satuan')->result_array();
        $data['atk'] = $this->db->get_where('at_atk', ['id_atk' => $id_atk])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/edit', $data);
        $this->load->view('templates/footer');
    }


    public function editGo()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $id_atk = $this->input->post('id_atk');
        $nama_barang = $this->input->post('nama_barang');
        $merek = $this->input->post('merek');
        $type = $this->input->post('type');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');

        $log = [
            'username' => $this->input->post('username'),
            'log' => "Merubah permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('merek', $merek);
        $this->db->set('type', $type);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('satuan', $satuan);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil Diubah !
          </div>');
        redirect('permohonan_atk/proses');
    }

    public function hapus($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $is_active = 0;

        $log = [
            'username' => $this->input->post('username'),
            'log' => "Menghapus permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('is_active', $is_active);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil dihapus !
          </div>');
        redirect('permohonan_atk/proses');
    }

    public function proses()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_proses();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/proses', $data);
        $this->load->view('templates/footer');
    }

    public function terkirim()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_terkirim();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/terkirim', $data);
        $this->load->view('templates/footer');
    }

    public function shop()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_shop_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/shop', $data);
        $this->load->view('templates/footer');
    }

    public function pengambilan()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_pengambilan_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/pengambilan', $data);
        $this->load->view('templates/footer');
    }

    public function selesai()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_selesai_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function tolak()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model->list_permohonan_tolak_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/nav', $data);
        $this->load->view('permohonan_atk/ditolak', $data);
        $this->load->view('templates/footer');
    }
}
