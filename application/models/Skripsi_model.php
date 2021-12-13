<?php
class Skripsi_model extends CI_Model{
    // protected $ipSkripsi='http://10.5.12.21/skripsi/api/';
    // protected $ipPenjadwalan='http://10.5.12.47/penjadwalan/api/';
    // protected $ipDiskusi='http://10.5.12.56/diskusi/api/';
    // protected $ipUser='http://10.5.12.16/user/api/';

    protected $ipSkripsi='http://localhost/microservice/skripsi/api/';
    protected $ipPenjadwalan='http://localhost/microservice/penjadwalan/api/';
    protected $ipDiskusi='http://localhost/microservice/diskusi/api/';
    protected $ipUser='http://localhost/microservice/user/api/';
    
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
    public function getSkripsiByNip1($nip=null){
        $skripsi=[];
        $s[0] = $this->db->get_where('Skripsi', ['pembimbing_1' => $nip])->result_array();
        $s[1] = $this->db->get_where('Skripsi', ['pembimbing_2' => $nip])->result_array();
        $s[2] = $this->db->get_where('Skripsi', ['penguji_1' => $nip])->result_array();
        $s[3] = $this->db->get_where('Skripsi', ['penguji_2' => $nip])->result_array();
        $s[4] = $this->db->get_where('Skripsi', ['penguji_3' => $nip])->result_array();
        for ($i=0; $i<count($s);$i++){
            for($j=0;$j<count($s[$i]);$j++){
                array_push($skripsi,$s[$i][$j]);
            }
        }
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
        $topik =  $this->db->get('topik')->result_array();
        $status = $this->db->get('status')->result_array();
        $dosen = json_decode($this->curl->simple_get($this->ipUser.'dosen/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $mhs = json_decode($this->curl->simple_get($this->ipUser.'mahasiswa/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];

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
                        $data[$i]['kstatus']=$status[$j]['status'];
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