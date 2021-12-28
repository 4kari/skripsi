<?php
class Penilaian_model extends CI_Model{
    public function getPenilaian($id=null){
        if($id==null){
            return $this->db->get('Skripsi')->result_array();
        }else{
            return $this->db->get_where('Skripsi', ['id' => $id])->row_array()['nilai'];
        }
    }
    public function createPenilaian($data,$nilai){
        $penilaian = $this->db->get_where('Penilaian',$data)->row_array();
        if($penilaian){
            $this->db->update('Penilaian', array('nilai'=>$nilai), $data);
        }else{
            $data['nilai']=$nilai;
            $this->db->insert('Penilaian',$data);
        }
        $data_nilai = $this->db->get_where('Penilaian',array('id_skripsi'=>$data['id_skripsi']))->result_array();
        if(count($data_nilai)>=42){
            //tambah semua bagi 7
            $hasil=0;
            foreach($data_nilai as $dn){
                if($dn['kode_penilaian']==1){ $hasil+=($dn['nilai']*10/100);}
                if($dn['kode_penilaian']==2){ $hasil+=($dn['nilai']*20/100);}
                if($dn['kode_penilaian']==3){ $hasil+=($dn['nilai']*20/100);}
                if($dn['kode_penilaian']==4){ $hasil+=($dn['nilai']*30/100);}
                if($dn['kode_penilaian']==5){ $hasil+=($dn['nilai']*10/100);}
                if($dn['kode_penilaian']==6){ $hasil+=($dn['nilai']*10/100);}
                if($dn['kode_penilaian']==7){ $hasil+=($dn['nilai']*25/100);}
                if($dn['kode_penilaian']==8){ $hasil+=($dn['nilai']*15/100);}
                if($dn['kode_penilaian']==9){ $hasil+=($dn['nilai']*30/100);}
                if($dn['kode_penilaian']==10){ $hasil+=($dn['nilai']*5/100);}
                if($dn['kode_penilaian']==11){ $hasil+=($dn['nilai']*10/100);}
                if($dn['kode_penilaian']==12){ $hasil+=($dn['nilai']*15/100);}
            }
            $hasil=$hasil/7;
            $this->db->update('skripsi',array('nilai'=>$hasil),array('id'=>$data['id_skripsi']));
            if($hasil>20){
            $this->db->update('skripsi',array('status'=>7),array('id'=>$data['id_skripsi']));
            }else{
            $this->db->update('skripsi',array('status'=>8),array('id'=>$data['id_skripsi']));
            }
        }
        return $this->db->affected_rows();
    }
}
?>