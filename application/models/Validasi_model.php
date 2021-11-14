<?php
class Validasi_model extends CI_Model{
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
            $jadwal = json_decode($this->curl->simple_get('http://localhost/microservice/penjadwalan/api/Jadwal/',array('id_skripsi'=>$v['id_skripsi']), array(CURLOPT_BUFFERSIZE => 10)),true);
            // $jadwal = json_decode($this->curl->simple_get('http://10.5.12.47/penjadwalan/api/Jadwal/',array('id_skripsi'=>$v['id_skripsi']), array(CURLOPT_BUFFERSIZE => 10)),true);
            
            // var_dump($jadwal);
            // die();
            $found=FALSE;
            if(!$v['pembimbing_1'] || !$v['pembimbing_2']){
                $found=TRUE;
            }
            if($jadwal && $found===FALSE){
                foreach($jadwal as $j){
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
        return $this->db->affected_rows();
    }
    public function updateValidasi($data,$id){
        $this->db->update('Validasi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>