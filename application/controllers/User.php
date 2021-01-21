<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function profil()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footer');
    }



    public function ubahFoto()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './image/';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['at_user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'image/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('at_user');
        $log = [
            'username' => $this->session->userdata('username'),
            'log' => "Berhasil Mengganti Foto.",
            'created_at' => time()
        ];
        $this->db->insert('at_log', $log);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
        redirect('user/profil');
    }

    public function ubahData()
    {
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();


        $name = $this->input->post('name');
        $no_hp = $this->input->post('no_hp');
        $this->db->set('name', $name);
        $this->db->set('no_hp', $no_hp);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('at_user');
        $log = [
            'username' => $this->session->userdata('username'),
            'log' => "Berhasil Mengganti Profil.",
            'created_at' => time()
        ];
        $this->db->insert('at_log', $log);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
        redirect('user/profil');
    }



    public function ubahPassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('at_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/ubahPassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('at_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/ubahPassword');
                    $log = [
                        'username' => $this->session->userdata('username'),
                        'log' => "Berhasil Mengganti Password.",
                        'created_at' => time()
                    ];
                    $this->db->insert('at_log', $log);
                }
            }
        }
    }
}
