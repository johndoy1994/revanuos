<?php

class Portfolio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //insert into user table
    function insertPortfolio($data) {
        //echo "";print_r($data);exit;
        $resul = $this->db->insert('portfolio', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function updatePortfolio($data) {
        //$this->db->where('usr_email', $data['usr_email']);
        $this->db->where('id', $data['id']);
        $this->db->update('portfolio', $data);
        return true;
    }

    function all_portfolio_data() {

        $this->db->select('*');
        $this->db->from('portfolio');

        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }

    function get_portfolio_data($id) {

        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('portfolio');

        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function portfolio_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('portfolio');
    }

}

?>