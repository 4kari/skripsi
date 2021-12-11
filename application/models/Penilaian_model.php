<?php
class Penilaian_model extends CI_Model{
    public function getPenilaian($id=null,$penilai=null){
        return $this->db->get_where('Penilaian', ['id_skripsi' => $id, 'penilai' => $penilai])->result_array();
    }
    public function createPenilaian($data,$nilai){
        $penilaian = $this->db->get_where('Penilaian',$data)->row_array();
        if($penilaian){
            $this->db->update('Penilaian', array('nilai'=>$nilai), $data);
        }else{
            $data['nilai']=$nilai;
            $this->db->insert('Penilaian',$data);
        }
        return $this->db->affected_rows();
    }
}
?>