<?php
class Services_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    
    function getServices(){

        $this->db->select('*');
        $this->db->from('services');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function insertServices($data)
    {
    	$resul= $this->db->insert('services', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function selectServicesData($data){
        
        $query = $this->db->get_where('services',$data);
        $rs = $query->result();
        return $rs;
    }

    function updateServices($data){
        $this->db->where('id', $data['id']);
        $this->db->update('services' ,$data);
        return true;
    }
    
    function services_delete($id){
    	$this->db->where('id', $id);
   	$this->db->delete('Services');
    }
}
?>