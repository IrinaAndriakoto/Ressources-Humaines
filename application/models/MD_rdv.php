<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MD_rdv extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    $this->load->helper('url');

    } 
  
    public function get_horaires_disponibles() {
        $this->db->select('disponibilite.*, personnel.nom as nom_personnel');
        $this->db->from('disponibilite');
        $this->db->join('personnel', 'personnel.id = disponibilite.idpersonnel');
        $this->db->where('dispo', TRUE); // Filtre pour les horaires où 'dispo' est 'true'
        $query = $this->db->get();
    
        return $query->result();
    }

    public function confirmer_rdv($horaire_id) {
        $this->db->set('dispo', FALSE);
        $this->db->where('id', $horaire_id);
        $this->db->update('disponibilite');
    }
}