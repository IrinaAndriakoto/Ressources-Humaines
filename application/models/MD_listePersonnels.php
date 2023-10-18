<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MD_listePersonnels extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getListe() {
        $sql = "
            select nom,datedenaissance,email,datedembauche,genre,direction,fonction from personnel;
        ";
    
        $query = $this->db->query($sql);
    
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return array(); // Renvoyer un tableau vide si aucune donnée n'est trouvée
    }
    
    public function calculerAgeEtStatut($dateNaissance) {
        // Convertissez la date de naissance en objet DateTime
        $dateNaissance = new DateTime($dateNaissance);
        
        // Obtenez la date actuelle
        $dateAujourdhui = new DateTime();
    
        // Calculez la différence entre la date de naissance et la date actuelle
        $difference = $dateNaissance->diff($dateAujourdhui);
    
        // Obtenez l'âge de la personne
        $age = $difference->y;
    
        // Déterminez le statut en fonction de l'âge
        $statut = 'Inconnu';
        if ($age < 18) {
            $statut = 'Mineur';
        } elseif ($age >= 60) {
            $statut = 'Retraité';
        } else {
            $statut = 'Majeur';
        }
    
        return ['age' => $age, 'statut' => $statut];
    }
}