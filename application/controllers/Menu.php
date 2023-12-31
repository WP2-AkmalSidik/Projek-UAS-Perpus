<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller{
    public function __construct(){
        parent::__construct();
        is_logged_in();
    }
    public function index(){
        $data['title'] = 'Menu Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu','Menu','required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/u_header',$data);
            $this->load->view('templates/u_sidebar',$data);
            $this->load->view('templates/u_topbar',$data);
            $this->load->view('menu/index',$data);
            $this->load->view('templates/u_footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Menu berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('menu');
        }
    }
    public function submenu(){
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model','menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('tittle','Title','required');
        $this->form_validation->set_rules('menu_id','Menu','required');
        $this->form_validation->set_rules('url','url','required');
        $this->form_validation->set_rules('icon','icon','required');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/u_header',$data);
            $this->load->view('templates/u_sidebar',$data);
            $this->load->view('templates/u_topbar',$data);
            $this->load->view('menu/submenu',$data);
            $this->load->view('templates/u_footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            SubMenu berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('menu');
        }
    }
}