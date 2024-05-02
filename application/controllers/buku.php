<?php
class Buku extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        check_session();
    }

    function tampil_buku_admin()
    {
        check_session('admin');
        $data['record'] = $this->model_buku->tampil_data();
        $this->template->load('template/template_admin','buku/tampil_data',$data);
    }

    function tampil_buku_user()
    {
        check_session('user');
        $data['record'] = $this->model_buku->tampil_data();
        $data['total_records'] = $this->model_buku->get_total_records();
        $this->template->load('template/template_user','user/tampil_buku_user',$data);
    }

    function tampil_unggahan_saya()
    {
        check_session('user');
        $data['record'] = $this->model_buku->tampil_unggahan();
        $this->template->load('template/template_user','user/tampil_unggahan_saya',$data);
    }
    
    function post()
    {
        check_session('admin');
        if(isset($_POST['submit'])){
            $judul       = $this->input->post('judul');
            $kategori    = $this->input->post('kategori');
            $deskripsi   = $this->input->post('deskripsi');
            $jumlah      = $this->input->post('jumlah');
            $id_user = $this->session->userdata('id_user');

            // Konfigurasi upload file
            $config_file['upload_path']   = FCPATH . 'assets/file/';
            $config_file['allowed_types'] = 'pdf';
            $config_file['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config_file);

            if (!$this->upload->do_upload('file_buku')) {
                // Jika upload file buku gagal
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                // Jika upload file buku sukses
                $upload_data = $this->upload->data();
                $file_buku = $upload_data['file_name'];

                // Konfigurasi upload cover
                // Konfigurasi upload cover
                $config_cover['upload_path']   = FCPATH . 'assets/images/';
                $config_cover['allowed_types'] = 'jpg|png';
                $config_cover['max_size'] = 1024; // 1MB

                $this->upload->initialize($config_cover);


                if (!$this->upload->do_upload('cover_buku')) {
                    // Jika upload cover buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload cover buku sukses
                    $cover_data = $this->upload->data();
                    $cover_buku = $cover_data['file_name'];

                    // Lakukan sesuatu dengan file dan cover, contoh simpan ke database
                    $data = array(
                        'judul' => $judul,
                        'id_kategori' => $kategori,
                        'deskripsi' => $deskripsi,
                        'jumlah' => $jumlah,
                        'file_buku' => $file_buku,
                        'cover_buku' => $cover_buku,
                        'id_user' => $id_user
                    );

                    $this->model_buku->post($data);
                    redirect('buku/tampil_buku_admin');
                }
            }
        } else {
            $this->load->model('model_kategori');
            $data['kategori'] =  $this->model_kategori->tampil_data()->result();
            $data['url'] =  'buku/post';
            $data['url_back'] =  'buku/tampil_buku_admin';
            $this->template->load('template/template_admin','buku/form_input',$data);
        }
    }

    function post_user()
    {
        check_session('user');
        if(isset($_POST['submit'])){
            $judul       = $this->input->post('judul');
            $kategori    = $this->input->post('kategori');
            $deskripsi   = $this->input->post('deskripsi');
            $jumlah      = $this->input->post('jumlah');
            $id_user = $this->session->userdata('id_user');

            // Konfigurasi upload file
            $config_file['upload_path']   = FCPATH . 'assets/file/';
            $config_file['allowed_types'] = 'pdf';
            $config_file['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config_file);

            if (!$this->upload->do_upload('file_buku')) {
                // Jika upload file buku gagal
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                // Jika upload file buku sukses
                $upload_data = $this->upload->data();
                $file_buku = $upload_data['file_name'];

                // Konfigurasi upload cover
                // Konfigurasi upload cover
                $config_cover['upload_path']   = FCPATH . 'assets/images/';
                $config_cover['allowed_types'] = 'jpg|png';
                $config_cover['max_size'] = 1024; // 1MB

                $this->upload->initialize($config_cover);


                if (!$this->upload->do_upload('cover_buku')) {
                    // Jika upload cover buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload cover buku sukses
                    $cover_data = $this->upload->data();
                    $cover_buku = $cover_data['file_name'];

                    // Lakukan sesuatu dengan file dan cover, contoh simpan ke database
                    $data = array(
                        'judul' => $judul,
                        'id_kategori' => $kategori,
                        'deskripsi' => $deskripsi,
                        'jumlah' => $jumlah,
                        'file_buku' => $file_buku,
                        'cover_buku' => $cover_buku,
                        'id_user' => $id_user
                    );

                    $this->model_buku->post($data);
                    redirect('buku/tampil_buku_user');
                }
            }
        } else {
            $this->load->model('model_kategori');
            $data['kategori'] =  $this->model_kategori->tampil_data()->result();
            $data['url'] =  'buku/post_user';
            $data['url_back'] =  'buku/tampil_buku_user';
            $this->template->load('template/template_admin','buku/form_input',$data);
        }
    }


    function edit()
    {
        check_session('admin');
        
        if(isset($_POST['submit'])){
            $id          = $this->input->post('id_buku');
            $judul       = $this->input->post('judul');
            $kategori    = $this->input->post('kategori');
            $deskripsi   = $this->input->post('deskripsi');
            $jumlah      = $this->input->post('jumlah');
            $id_user = $this->session->userdata('id_user');
    
            // Ambil data buku yang akan diubah
            $existing_data = $this->model_buku->get_one($id) -> row();
    
            // Konfigurasi upload file
            $config_file['upload_path']   = FCPATH . 'assets/file/';
            $config_file['allowed_types'] = 'pdf';
            $config_file['max_size'] = 2048; // 2MB
    
            $this->load->library('upload', $config_file);
    
            // Handle upload file buku jika ada perubahan
            if ($_FILES['file_buku']['size'] > 0) { 
                
                if (!$this->upload->do_upload('file_buku')) {
                    // Jika upload file buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload file buku sukses
                    $upload_data = $this->upload->data();
                    $file_buku = $upload_data['file_name'];
    
                    // Hapus file buku lama jika ada
                    if (file_exists($existing_data->file_buku)) {
                        unlink($existing_data->file_buku);
                    }
                }
            } else { 
                // Jika tidak ada perubahan pada file buku
                $file_buku = $existing_data->file_buku;
            }

            // Konfigurasi upload cover
            $config_cover['upload_path']   = FCPATH . 'assets/images/';
            $config_cover['allowed_types'] = 'jpg|png';
            $config_cover['max_size'] = 1024; // 1MB

            $this->upload->initialize($config_cover);
    
            // Handle upload cover buku jika ada perubahan
            if ($_FILES['cover_buku']['size'] > 0) {
                if (!$this->upload->do_upload('cover_buku')) {
                    // Jika upload cover buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload cover buku sukses
                    $cover_data = $this->upload->data();
                    $cover_buku = $cover_data['file_name'];
    
                    // Hapus cover lama jika ada
                    if (file_exists($existing_data->cover_buku)) {
                        unlink($existing_data->cover_buku);
                    }
                }
            } else {
                // Jika tidak ada perubahan pada cover buku
                $cover_buku = $existing_data->cover_buku;
            }
    
            // Lakukan sesuatu dengan file dan cover, contoh simpan ke database
            $data = array(
                'id_buku'      => $id,
                'judul'        => $judul,
                'id_kategori'  => $kategori,
                'deskripsi'    => $deskripsi,
                'jumlah'       => $jumlah,
                'file_buku'    => $file_buku,
                'cover_buku'   => $cover_buku
            );
    
            // Update data ke database
            $this->model_buku->edit($data, $id);
    
            redirect('buku/tampil_buku_admin', 'refresh');
        } else {
            // Jika tidak ada data post, tampilkan form edit
            $id = $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['url'] =  'buku/edit';
            $data['url_back'] =  'buku/tampil_buku_admin';
            $data['kategori'] = $this->model_kategori->tampil_data()->result();
            $data['record']   = $this->model_buku->get_one($id)->row_array();
            $this->template->load('template/template_admin', 'buku/form_edit', $data);
        }
    }

    function edit_data_saya()
    {
        check_session('user');
        
        if(isset($_POST['submit'])){
            $id          = $this->input->post('id_buku');
            $judul       = $this->input->post('judul');
            $kategori    = $this->input->post('kategori');
            $deskripsi   = $this->input->post('deskripsi');
            $jumlah      = $this->input->post('jumlah');
            $id_user = $this->session->userdata('id_user');
    
            // Ambil data buku yang akan diubah
            $existing_data = $this->model_buku->get_one($id) -> row();
    
            // Konfigurasi upload file
            $config_file['upload_path']   = FCPATH . 'assets/file/';
            $config_file['allowed_types'] = 'pdf';
            $config_file['max_size'] = 2048; // 2MB
    
            $this->load->library('upload', $config_file);
    
            // Handle upload file buku jika ada perubahan
            if ($_FILES['file_buku']['size'] > 0) { 
                
                if (!$this->upload->do_upload('file_buku')) {
                    // Jika upload file buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload file buku sukses
                    $upload_data = $this->upload->data();
                    $file_buku = $upload_data['file_name'];
    
                    // Hapus file buku lama jika ada
                    if (file_exists($existing_data->file_buku)) {
                        unlink($existing_data->file_buku);
                    }
                }
            } else { 
                // Jika tidak ada perubahan pada file buku
                $file_buku = $existing_data->file_buku;
            }

            // Konfigurasi upload cover
            $config_cover['upload_path']   = FCPATH . 'assets/images/';
            $config_cover['allowed_types'] = 'jpg|png';
            $config_cover['max_size'] = 1024; // 1MB

            $this->upload->initialize($config_cover);
    
            // Handle upload cover buku jika ada perubahan
            if ($_FILES['cover_buku']['size'] > 0) {
                if (!$this->upload->do_upload('cover_buku')) {
                    // Jika upload cover buku gagal
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    // Jika upload cover buku sukses
                    $cover_data = $this->upload->data();
                    $cover_buku = $cover_data['file_name'];
    
                    // Hapus cover lama jika ada
                    if (file_exists($existing_data->cover_buku)) {
                        unlink($existing_data->cover_buku);
                    }
                }
            } else {
                // Jika tidak ada perubahan pada cover buku
                $cover_buku = $existing_data->cover_buku;
            }
    
            // Lakukan sesuatu dengan file dan cover, contoh simpan ke database
            $data = array(
                'id_buku'      => $id,
                'judul'        => $judul,
                'id_kategori'  => $kategori,
                'deskripsi'    => $deskripsi,
                'jumlah'       => $jumlah,
                'file_buku'    => $file_buku,
                'cover_buku'   => $cover_buku
            );
    
            // Update data ke database
            $this->model_buku->edit($data, $id);
    
            redirect('buku/tampil_buku_user', 'refresh');
        } else {
            // Jika tidak ada data post, tampilkan form edit
            $id = $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['url'] =  'buku/edit_data_saya';
            $data['url_back'] =  'buku/tampil_unggahan_saya';
            $data['kategori'] = $this->model_kategori->tampil_data()->result();
            $data['record']   = $this->model_buku->get_one($id)->row_array();
            $this->template->load('template/template_admin', 'buku/form_edit', $data);
        }
    }
    
    
    function delete()
    {
        check_session();
        $id=  $this->uri->segment(3);
        $this->model_buku->delete($id);
        $param = $this->uri->segment(4);
        if ($param == 'user') {
            redirect ('buku/tampil_unggahan_saya');
        }else{
            redirect ('buku/tampil_buku_admin');
        }
    }

    function excel()
    {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record']=  $this->model_buku->tampil_data();
        $this->load->view('buku/laporan_excel',$data);
    }
    
    
    function pdf()
    {
        check_session('admin');
    
        $this->load->library('cfpdf');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Text(10, 10, 'Data Buku');
    
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, '', '', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(10, 25, 'No', 1, 0, 'C', true);
        $pdf->Cell(35, 25, 'Judul Buku', 1, 0, 'C', true);
        $pdf->Cell(20, 25, 'Kategori', 1, 0, 'C', true);
        $pdf->Cell(13, 25, 'Jumlah', 1, 0, 'C', true);
        $pdf->Cell(35, 25, 'File Buku', 1, 0, 'C', true);
        $pdf->Cell(35, 25, 'Cover Buku', 1, 0, 'C', true);
        $pdf->Cell(35, 25, 'Nama User', 1, 0, 'C', true);
    
        $pdf->SetFont('Arial', '', 8);
        $data = $this->model_buku->tampil_data();
        $no = 1;
    
        foreach ($data->result() as $r) {
    
            $pdf->Cell(10, 25, '', '', 1);
            $pdf->Cell(10, 25, $no, 1, 0, 'C', true);
            $pdf->Cell(35, 25, $r->judul, 1, 0, 'L', true);
            $pdf->Cell(20, 25, $r->nama_kategori, 1, 0, 'L', true);
            $pdf->Cell(13, 25, $r->jumlah, 1, 0, 'C', true);
            $pdf->Cell(35, 25, $r->file_buku, 1, 0, 'L', true);
            $pdf->Cell(35, 25, $r->cover_buku, 1, 0, 'L', true);
            $pdf->Cell(35, 25, $r->nama_user, 1, 0, 'L', true);
            $no++;
        }
    
        $pdf->Output();
    }
    
    
    
    

}