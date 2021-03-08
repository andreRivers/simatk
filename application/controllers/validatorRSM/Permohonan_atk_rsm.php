<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_atk_rsm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Permohonan_model_rsm');
        $this->load->model('Validator_permohonan_model_rsm');
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
            $this->load->view('permohonan_atk_rsm/input', $data);
            $this->load->view('templates/footer');
        } else {
            $atk = [
                'username' =>  $this->session->userdata('username'),
                'nama_barang' => $this->input->post('nama_barang'),
                'merek' => $this->input->post('merek'),
                'type' => $this->input->post('type'),
                'jumlah' => $this->input->post('jumlah'),
                'satuan' => $this->input->post('satuan'),
                'sts' => 10,
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
            redirect('validator/permohonan_atk_rsm/proses');
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
        $this->load->view('permohonan_atk_rsm/nav', $data);
        $this->load->view('permohonan_atk_rsm/edit', $data);
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
        redirect('validator/permohonan_atk_rsm/proses');
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
        redirect('validator/permohonan_atk_rsm/proses');
    }

    public function setuju($id_atk)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $sts = 20;
        $date_validator = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => " validator Setuju permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('sts', $sts);
        $this->db->set('date_validator', $date_validator);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil disetujui !
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
        $date_validator = date("Y-m-d H:i:s");

        $log = [
            'username' => $this->input->post('username'),
            'log' => " validator Menolak permohonan Dengan ID = $id_atk",
            'created_at' => time()
        ];

        $this->db->set('komentar', $komentar);
        $this->db->set('sts', $sts);
        $this->db->set('date_validator', $date_validator);
        $this->db->where('id_atk', $id_atk);
        $this->db->update('at_atk');

        $this->db->insert('at_log', $log);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil ditolak !
          </div>');
        redirect('validator/permohonan_atk_rsm/proses');
    }

    public function inbox()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/inbox', $data);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_proses();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/proses', $data);
        $this->load->view('templates/footer');
    }

    public function prosesDetail($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model_rsm->list_permohonan_detail($username, $created_at);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/prosesDetail',$data);
        $this->load->view('templates/footer');
    }

    public function shop()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_shop();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/shop', $data);
        $this->load->view('templates/footer');
    }

    public function pengambilan()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_pengambilan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/pengambilan', $data);
        $this->load->view('templates/footer');
    }

    public function tolak()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->db->get_where('at_atk', ['username' => $this->session->userdata('username'), 'sts' => 6, 'is_active' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/ditolak', $data);
        $this->load->view('templates/footer');
    }


    public function cst($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_detail($username, $created_at);
        $data['tk'] = $this->Validator_permohonan_model_rsm->list_permohonan_cetak($username, $created_at);
        $this->load->view('permohonan_atk_rsm/cetak/cst',$data);

    }

    public function sending()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_sending();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/sending', $data);
        $this->load->view('templates/footer');
    }


    public function diterima($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_serahTerima($username, $created_at);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/tandaTerima',$data);
        $this->load->view('templates/footer2');

    }

      public function diterimaGo()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        define('UPLOAD_DIR', 'tandaTerima/');
        $username = $this->input->post('username');
        $created_at = $this->input->post('created_at');
        $sts=70;
        $date_selesai = date("Y-m-d H:i:s");
        $img = $_POST['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = UPLOAD_DIR . uniqid() . '.jpeg';
        $success = file_put_contents($file, $data);

        $this->Validator_permohonan_model_rsm->save_tandaTerima($username, $created_at, $sts, $date_selesai, $file, $img);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Permohonan Anda Berhasil dihapus !
          </div>');
        redirect('validator/permohonan_atk_rsm/pengambilan');

    }

    public function selesai()
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Validator_permohonan_model_rsm->list_permohonan_selesai();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/selesai', $data);
        $this->load->view('templates/footer');
    }

     public function detailSelesai($username, $created_at)
    {
        $data['title'] = 'Permohonan ATK';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['atk'] = $this->Permohonan_model_rsm->list_permohonan_detail($username, $created_at);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan_atk_rsm/admin/nav', $data);
        $this->load->view('permohonan_atk_rsm/admin/detailSelesai',$data);
        $this->load->view('templates/footer');
    }

}
