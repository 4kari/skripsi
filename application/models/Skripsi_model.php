<?php
class Skripsi_model extends CI_Model{
    public function getSkripsi(){
        $skripsi = $this->db->get('Skripsi')->result_array();
        $data = $this->olahSkripsi($skripsi);
        return $data;
    }
    public function getSkripsiByid($id=null){
        $skripsi = $this->db->get_where('Skripsi', ['id' => $id])->result_array();
        $data = $this->olahSkripsi($skripsi);
        return $data;
    }
    public function getSkripsiByNim($nim=null){
        $skripsi = $this->db->get_where('Skripsi', ['nim' => $nim])->result_array();
        $data = $this->olahSkripsi($skripsi);
        return $data;
    }
    public function getSkripsiByStatus($status=null){
        $skripsi = $this->db->get_where('Skripsi', ['status' => $status])->result_array();
        $data = $this->olahSkripsi($skripsi);
        return $data;
    }
    private function olahSkripsi($skripsi){
        // $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        // $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/mahasiswa/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $topik =  $this->db->get('topik')->result_array();
        $status = $this->db->get('status')->result_array();
        $dosen = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $mhs = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/mahasiswa/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];

        $data = [];
        if ($skripsi){
            for ($i=0;$i<count($skripsi);$i++){
                array_push($data,$skripsi[$i]);
            }
            for ($i=0;$i<count($data);$i++){
                for ($j=0;$j<count($mhs);$j++){
                    if($data[$i]['nim']==$mhs[$j]['nim']){
                        $data[$i]['nama']=$mhs[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($topik);$j++){
                    if($data[$i]['topik']==$topik[$j]['id']){
                        $data[$i]['ktopik']=$topik[$j]['topik'];
                    }
                }
                for ($j=0;$j<count($dosen);$j++){
                    if($data[$i]['pembimbing_1']==$dosen[$j]['nip']){
                        $data[$i]['npembimbing_1']=$dosen[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($dosen);$j++){
                    if($data[$i]['pembimbing_2']==$dosen[$j]['nip']){
                        $data[$i]['npembimbing_2']=$dosen[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($dosen);$j++){
                    if($data[$i]['penguji_1']==$dosen[$j]['nip']){
                        $data[$i]['npenguji_1']=$dosen[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($dosen);$j++){
                    if($data[$i]['penguji_2']==$dosen[$j]['nip']){
                        $data[$i]['npenguji_2']=$dosen[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($dosen);$j++){
                    if($data[$i]['penguji_3']==$dosen[$j]['nip']){
                        $data[$i]['npenguji_3']=$dosen[$j]['nama'];
                    }
                }
                for ($j=0;$j<count($status);$j++){
                    if($data[$i]['status']==$status[$j]['id']){
                        $data[$i]['statusid']=$data[$i]['status'];
                        $data[$i]['status']=$status[$j]['status'];
                    }
                }
            }
        }
        return $data;
    }
    public function deleteSkripsi($id){
        //data master tidak bisa dihapus
        $this->db->delete('Skripsi', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createSkripsi($data){
        $this->db->insert('Skripsi',$data);
        return $this->db->affected_rows();
    }
    public function updateSkripsi($data,$id){
        $this->db->update('Skripsi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>