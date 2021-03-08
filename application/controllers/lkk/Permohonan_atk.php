<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_atk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Lkk_model');
    }

    public function proses()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/proses', $data);
        $this->load->view('templates/footer');
    }

    public function prosesDetail($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_detail($username, $created_at);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/prosesDetail',$data);
        $this->load->view('templates/footer');
    }

    public function setuju($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $sts = 4;
        $date_shop = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => " LKK Setuju permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('sts', $sts);
        $this->db->set('date_shop', $date_shop);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil disetujui !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
    }


    public function shop()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_shop();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/shop', $data);
        $this->load->view('templates/footer');
    }
    public function prosesDetailShop($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_shop_detail($username, $created_at);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/shopDetail',$data);
        $this->load->view('templates/footer');
    }

    public function inputHarga($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->db->get('at_satuan')->result_array();
        $data['atk'] = $this->db->get_where('at_atk', ['id_atk' => $id_atk])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/inputHarga', $data);
        $this->load->view('templates/footer');
    }

    public function hargaGo()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $id_atk = $this->input->post('id_atk');
        $nama_barang = $this->input->post('nama_barang');
        $satuan = $this->input->post('satuan');
        $merek = $this->input->post('merek');
        $type = $this->input->post('type');
        $jumlah = $this->input->post('jumlah');
        $upah = $this->input->post('upah');
        $harga = $this->input->post('harga');
        $total = $this->input->post('total');
        $sts = 5;
        $tagihan = 1;

        $log = [
            'username' => $this->input->post('username'),
            'log' => " LKK Menginput Harga Item permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('merek', $merek);
        $this->db->set('satuan', $satuan);
        $this->db->set('type', $type);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('pemasangan', $upah);
        $this->db->set('harga', $harga);
        $this->db->set('total', $total);
        $this->db->set('tagihan', $tagihan);
        $this->db->set('sts', $sts);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> harga Berhasil Diinput !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
          echo "<script>window.history.back(-1);</script>";	
    }

    public function pengambilan()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_pengambilan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/pengambilan', $data);
        $this->load->view('templates/footer');
    }


    public function sending()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_sending();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/sending', $data);
        $this->load->view('templates/footer');
    }



    public function cetakBa($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_detail($username, $created_at);
        $data['tk'] = $this->Lkk_model->list_permohonan_cetak($username, $created_at);
        $this->load->view('permohonan_atk/cetak/ba',$data);

    }

    public function diterima($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $sts = 6;

        $log = [
            'username' => $this->input->post('username'),
            'log' => " LKK Menyerakan Ke Baum permohonan Dengan $username,  $created_at ",
            'created_at' => time()
        ];

        $this->db->set('sts', $sts);
        $this->db->where('username', $username);
        $this->db->where('created_at', $created_at);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil disetujui !
          </div>');
          echo "<script>window.history.back(-1);</script>";	

    }

    public function tagihan($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $tagihan = 2;
        $date_tagihan = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => "LKK Memasukan Tagihan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('tagihan', $tagihan);
        $this->db->set('date_tagihan', $date_tagihan);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Behasil Memasukan Tagihan !
          </div>');
          echo "<script>window.history.back(-1);</script>";	
    }

    public function selesai()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_permohonan_selesai();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function invoice()
    {
        $data['title'] = 'Invoice Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Lkk_model->list_invoice();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk/admin/nav', $data);
        $this->load->view('permohonan_atk/admin/invoice', $data);
        $this->load->view('templates/footer');
    }
}
