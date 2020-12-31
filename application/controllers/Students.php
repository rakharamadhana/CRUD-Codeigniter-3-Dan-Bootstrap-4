<?php

class Students extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Students_model');
    }
    
    public function index()
    {
        $data['murid'] = $this->Students_model->viewMurid();
        $this->load->view('ListStudents', $data);
    }

    public function create()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode

        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('nim', 'NIM', 'required');
        $validation->set_rules('fakultas', 'Fakultas', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('CreateStudents');
        } else {
          $this->Students_model->tambahMurid();
          $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil masuk kedalam database</div>');
          redirect('students');
        }  
    }

    public function delete($id)
    {
        $this->Students_model->hapus($id);
        redirect('students');
    }

    public function update($id)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['murid'] = $this->Students_model->getById($id);

        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('nim', 'NIM', 'required');
        $validation->set_rules('fakultas', 'Fakultas', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('UpdateStudents', $data);
        } else {
            $this->Students_model->ubahMurid();
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('students');
        }
    }

}