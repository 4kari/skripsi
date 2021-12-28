<?php
class Validasi_model extends CI_Model{
    protected $ipSkripsi='http://10.5.12.24/skripsi/api/';
    protected $ipPenjadwalan='http://10.5.12.82/penjadwalan/api/';
    protected $ipDiskusi='http://10.5.12.56/diskusi/api/';
    protected $ipUser='http://10.5.12.18/user/api/';

    // protected $ipSkripsi='http://localhost/microservice/skripsi/api/';
    // protected $ipPenjadwalan='http://localhost/microservice/penjadwalan/api/';
    // protected $ipDiskusi='http://localhost/microservice/diskusi/api/';
    // protected $ipUser='http://localhost/microservice/user/api/';
    
    public function getValidasi(){
        return $this->db->get('Validasi')->result_array();
    }
    public function getValidasiById($id){
        return $this->db->get_where('Validasi', ['id' => $id])->result_array();
    }
    public function getValidasiBySkripsi($id){
        return $this->db->get_where('validasi',['id_skripsi'=>$id])->result_array();
    }
    public function getPendaftar(){
        $validasi=$this->getValidasi();
        $data = [];
        foreach($validasi as $v){        
            $v['data_skripsi']=$this->db->get_where('skripsi',['id'=>$v['id_skripsi']])->row_array(); //dapat data skripsi tiap validasi
            $jadwal = json_decode($this->curl->simple_get($this->ipPenjadwalan.'Jadwal/',array('id_skripsi'=>$v['id_skripsi']), array(CURLOPT_BUFFERSIZE => 10)),true);
            
            // var_dump($jadwal);
            // die();
            $found=FALSE;
            if(!$v['pembimbing_1'] || !$v['pembimbing_2']){
                $found=TRUE;
            }
            if($jadwal && $found===FALSE){
                foreach($jadwal['data'] as $j){
                    if($j['tipe']==$v['tipe']-1){
                        $found=TRUE;
                    }
                }
            }
            if($found!==TRUE){
                array_push($data,$v);
            }
        }
        return $data;
    }
    public function deleteValidasi($id){
        //data master tidak bisa dihapus
        $this->db->delete('Validasi', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createValidasi($data){
        $this->db->insert('Validasi',$data);
        
        $skripsi = $this->db->get_where('Skripsi', ['id' => $data['id_skripsi']])->row_array();
        if($skripsi['status']==3){
            $this->db->update('Skripsi',['status' =>4],['id'=>$skripsi['id']]);    
        }
        return $this->db->affected_rows();
    }
    public function updateValidasi($data,$id){
        $this->db->update('Validasi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>