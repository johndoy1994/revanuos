<?php
class Career_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    
    function getCareer(){

        $this->db->select('*');
        $this->db->from('career');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function insertCareer($data)
    {
    	$resul= $this->db->insert('career', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function selectCareerData($data){
        
        $query = $this->db->get_where('career',$data);
        $rs = $query->result();
        return $rs;
    }

    function updateCareer($data){
        $this->db->where('id', $data['id']);
        $this->db->update('career' ,$data);
        return true;
    }
    
    function career_delete($id){
    	$this->db->where('id', $id);
   	$this->db->delete('career');
    }
}
?>