<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MD_programme extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_programme_data($id_horaire) {
        $sql = "
            SELECT d.jour as jour , d.debut as debut, c.nomCandidat as candidat, p.nom as nom
            FROM programme as pr
            JOIN disponibilite as d ON pr.id_dispo = d.id
            JOIN CandidatRecuTest as c ON pr.id_candidat = c.idCandidatRecuTest
            JOIN Personnel as p ON pr.id_personnel = p.id
            WHERE d.id = ?
        ";
    
        $query = $this->db->query($sql, array($id_horaire));
    
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return array(); // Renvoyer un tableau vide si aucune donnée n'est trouvée
    }
}