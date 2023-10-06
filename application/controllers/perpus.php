<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpus extends CI_Controller
{

    public function daftarBuku()
    {
        $data['buku'] = $this->model_buku->tampil_data()->result();
        $data['title'] = 'Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/u_header', $data);
        $this->load->view('templates/u_sidebar', $data);
        $this->load->view('templates/u_topbar', $data);
        $this->load->view('perpus/buku', $data);
        $this->load->view('templates/u_footer');
    }
    public function dataBuku()
    {
        $data['buku'] = $this->model_buku->tampil_data()->result();
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/u_header', $data);
        $this->load->view('templates/u_sidebar', $data);
        $this->load->view('templates/u_topbar', $data);
        $this->load->view('perpus/databuku', $data);
        $this->load->view('templates/u_footer');
    }
    public function tambahaksi()
    {
        $judul_buku = $this->input->post('judul_buku');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img/upload';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal di Upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'judul_buku' => $judul_buku,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'stok' => $stok,
            'gambar' => $gambar
        );
        $this->model_buku->tambahbuku($data, 'tb_buku');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('perpus/databuku');
        redirect('perpus/databuku');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['buku'] = $this->model_buku->edit_buku($where, 'tb_buku')->result();
        $this->load->view('templates/u_header', $data);
        $this->load->view('templates/u_sidebar', $data);
        $this->load->view('templates/u_topbar', $data);
        $this->load->view('perpus/edit_buku', $data);
        $this->load->view('templates/u_footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $judul_buku = $this->input->post('judul_buku');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $data = array(
            'judul_buku' => $judul_buku,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'stok' => $stok
        );
        $where = array(
            'id' => $id
        );
        $this->model_buku->update_buku($where, $data, 'tb_buku');
        redirect('perpus/databuku');
    }
    public function hapus($id){
        $where = array('id' => $id);
        $this->model_buku->hapus_buku($where, 'tb_buku');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('perpus/databuku');
    }
    public function detail_buku($id){
        $data['title'] = 'Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['buku'] = $this->model_buku->edit_buku($where, 'tb_buku')->result();
        $data['buku'] = $this->model_buku->detail_buku($id);
        $this->load->view('templates/u_header', $data);
        $this->load->view('templates/u_sidebar', $data);
        $this->load->view('templates/u_topbar', $data);
        $this->load->view('perpus/detail_buku', $data);
        $this->load->view('templates/u_footer');
    }
}
