<?php
class Skripsi_mhs_model extends CI_Model{
    public function getSkripsi($nim=null){
        // $topik =  json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/topik/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        // $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        // $status = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/status/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];

        $topik =  json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/topik/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $dosen = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $status = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/status/', array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $skripsi=[];
        if ($nim === null){
            $skripsi = $this->db->get('Skripsi')->result_array();
        } else {
            $skripsi = $this->db->get_where('Skripsi', ['nim' => $nim])->result_array();
        }
        var_dump($skripsi);
        $data = [];
        if ($skripsi){
            for ($i=0;$i<count($skripsi);$i++){
                if ($skripsi[$i]['nim']==$nim){
                    array_push($data,$skripsi[$i]);
                }
            }
            for ($i=0;$i<count($data);$i++){
                for ($j=0;$j<count($topik);$j++){
                    if($data[$i]['topik']==$topik[$j]['id']){
                        $data[$i]['topik']=$topik[$j]['topik'];
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
}