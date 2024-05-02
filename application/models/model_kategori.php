<?php
class Model_kategori extends CI_Model{
    
    function tampil_data(){
        
        return $this->db->get('tb_kategori');
    }
    
    function post(){
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->insert('tb_kategori',$data);
    }
        
    function edit()
    {
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori'));
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('tb_kategori',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('tb_kategori',$param);
    }
    
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('tb_kategori');
    }
}