<?php
class model_buku extends ci_model{
    
    function tampil_data()
    {
        $query= "SELECT b.id_buku,b.judul,b.deskripsi,b.jumlah,
        b.deskripsi,b.file_buku,b.cover_buku,kb.nama_kategori,u.nama_user
        FROM tb_buku as b,tb_kategori as kb, tb_user as u
        WHERE b.id_kategori=kb.id_kategori and u.id_user=b.id_user";
        
        return $this->db->query($query);
    }

    function tampil_unggahan()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('b.id_buku,b.judul,b.deskripsi,b.jumlah,
        b.deskripsi,b.file_buku,b.cover_buku,kb.nama_kategori,u.nama_user');
        $this->db->join('tb_user as u','u.id_user=b.id_user', 'left');
        $this->db->join('tb_kategori as kb','b.id_kategori=kb.id_kategori', 'left');
        $this->db->where(['b.id_user' => $id_user]);

        return $this->db->get('tb_buku as b');
    }
    
    function post($data)
    {
        $this->db->insert('tb_buku',$data);
    }

    function post_data_saya($data)
    {
        $this->db->insert('tb_buku',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_buku'=>$id);
        return $this->db->get_where('tb_buku',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('id_buku',$id);
        $this->db->update('tb_buku',$data);
    }

    function edit_data_saya($data,$id)
    {
        $this->db->where('id_buku',$id);
        $this->db->update('tb_buku',$data);
    }
    
    function delete($id)
    {
        $this->db->where('id_buku',$id);
        $this->db->delete('tb_buku');
    }

    function get_total_records() {
        return $this->db->count_all_results('tb_buku');
    }
}