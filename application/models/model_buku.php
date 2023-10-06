<?php

class Model_buku extends CI_Model
{
    public function tampil_data(){
        return $this->db->get('tb_buku');
    }
    public function tambahbuku($data, $table){
        $this->db->insert($table, $data);
    }
    public function edit_buku($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_buku($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_buku($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function detail_buku($id){
        $result = $this->db->where('id', $id)->get('tb_buku');
        if($result->num_rows() > 0){
            return $result->result();
        }else {
            return false;
        }
    }
}

?>