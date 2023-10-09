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
    public function get_horaires_non_disponibles() {
        $this->db->select('disponibilite.*,personnel.nom as nom_personnel');
        $this->db->from('disponibilite');
        $this->db->join('personnel', 'personnel.id = disponibilite.idpersonnel');
        $this->db->where('dispo', FALSE); // Filtre pour les horaires où 'dispo' est 'true'
        $query = $this->db->get();
    
        return $query->result();
    }

    public function confirmer_rdv($horaire_id) {
        $this->db->set('dispo', FALSE);
        $this->db->where('id', $horaire_id);
        $this->db->update('disponibilite');
    }

    public function annuler_rdv($horaire_id) {
        $this->db->set('dispo',true);
        $this->db->where('id',$horaire_id);
        $this->db->update('disponibilite');
    }
    
    public function inserer_programme($id_candidat, $id_dispo, $id_personnel) {
        $sql = "INSERT INTO programme (id_candidat , id_dispo , id_personnel) values (1,%s,%s)";
        $sql = sprintf($sql,
            // $this->db->escape($id_candidat),
            $this->db->escape($id_dispo),
            $this->db->escape($id_personnel)
        );
        $this->db->query($sql);
        
    }
}