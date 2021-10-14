<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Skripsi extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Skripsi_model','mSkripsi');
    }
    public function index_get(){
        $id = $this->get('id');
        $nim = $this->get('nim');
        if ($id) {
            $Skripsi = $this->mSkripsi->getSkripsiById($id);
        }elseif($nim){
            $Skripsi = $this->mSkripsi->getSkripsiByNim($nim);
        } else{
            $Skripsi = $this->mSkripsi->getSkripsi();
        }
        if ($Skripsi){
            $this->response([
                'status' => true,
                'data' =>$Skripsi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete(){
        $id = $this->delete('id');
        if ($id == null){
            var_dump($id);
            $this->response([
                'status' => false,
                'message' => 'tambahkan id untuk hapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->mSkripsi->deleteSkripsi($id)>0){
                //ok
                $this->response([
                    'status' => true,
                    'message' => 'terhapus'
                ], REST_Controller::HTTP_NO_CONTENT);
            }
            else{
                $this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }          
        }
    }
    public function index_post(){
        $data=[
            'judul' => $this->post('judul'),
            'abstrak' => $this->post('abstrak'),
            'topik' => $this->post('topik'),
            'nim' => $this->post('nim'),
            'pembimbing_1' => $this->post('pembimbing_1'),
            'pembimbing_2' => $this->post('pembimbing_2'),
            'penguji_1' => $this->post('penguji_1'),
            'penguji_2' => $this->post('penguji_2'),
            'penguji_3' => $this->post('penguji_3'),
            'status' => $this->post('status'),
            'nilai' => $this->post('nilai'),
            'berkas' => $this->post('berkas')
        ];
        
        if ($this->mSkripsi->createSkripsi($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Skripsi baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Skripsi baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'judul' => $this->put('judul'),
            'abstrak' => $this->put('abstrak'),
            'topik' => $this->put('topik'),
            'nim' => $this->put('nim'),
            'pembimbing_1' => $this->put('pembimbing_1'),
            'pembimbing_2' => $this->put('pembimbing_2'),
            'penguji_1' => $this->put('penguji_1'),
            'penguji_2' => $this->put('penguji_2'),
            'penguji_3' => $this->put('penguji_3'),
            'status' => $this->put('status'),
            'nilai' => $this->put('nilai'),
            'berkas' => $this->put('berkas')
        ];

        if ($this->mSkripsi->updateSkripsi($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Skripsi berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}