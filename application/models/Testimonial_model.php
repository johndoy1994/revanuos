<?php
class Testimonial_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    
    function getTestimonial(){

        $this->db->select('*');
        $this->db->from('testimonial');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function insertTestimonial($data)
    {
    	$resul= $this->db->insert('testimonial', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function selectTestimonialData($data){
        
        $query = $this->db->get_where('testimonial',$data);
        $rs = $query->result();
        return $rs;
    }

    function updateTestimonial($data){
        $this->db->where('id', $data['id']);
        $this->db->update('testimonial' ,$data);
        return true;
    }
    
    function Testimonial_delete($id){
    	$this->db->where('id', $id);
   	$this->db->delete('testimonial');
    }
}
?>