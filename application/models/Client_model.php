<?php

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //insert into user table
    function insertClient($data) {
        //echo "";print_r($data);exit;
        $resul = $this->db->insert('client', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function updateClient($data) {
        //$this->db->where('usr_email', $data['usr_email']);
        $this->db->where('id', $data['id']);
        $this->db->update('client', $data);
        return true;
    }

    function all_client_data() {

        $this->db->select('*');
        $this->db->from('client');

        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }

    function get_client_data($id) {

        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('client');

        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function client_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('client');
    }

}

?>