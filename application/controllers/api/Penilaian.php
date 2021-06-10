<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Penilaian extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Penilaian_model','mPenilaian');
    }
    public function index_get(){
        $id = $this->get('id');
        if ($id == null) {
            $Penilaian = $this->mPenilaian->getPenilaian();
        } else{
            $Penilaian = $this->mPenilaian->getPenilaian($id);
        }
        if ($Penilaian){
            $this->response([
                'status' => true,
                'data' =>$Penilaian
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
            if ($this->mPenilaian->deletePenilaian($id)>0){
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
            'id_skripsi' => $this->post('id_skripsi'),
            'penilai' => $this->post('penilai'),
            'kode_penilaian' => $this->post('kode_penilaian'),
            'nilai' => $this->post('nilai')
        ];
        
        if ($this->mPenilaian->createPenilaian($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Penilaian baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Penilaian baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'id_skripsi' => $this->put('id_skripsi'),
            'penilai' => $this->put('penilai'),
            'kode_penilaian' => $this->put('kode_penilaian'),
            'nilai' => $this->put('nilai')
        ];

        if ($this->mPenilaian->updatePenilaian($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Penilaian berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}