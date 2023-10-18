<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_listePersonnels extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->helper('url');
        
        // Définissez la zone horaire ici
        date_default_timezone_set('Indian/Antananarivo');
    }
    public function index(){
        $this->load->helper('url');
        
        $this->load->model('MD_listePersonnels');
        
        $listepersos = $this->MD_listePersonnels->getListe();
        
        $data['persos']= $listepersos;

         // Parcourez la liste des personnes pour calculer l'âge et le statut
    foreach ($listepersos as $perso) {
        $ageEtStatut = $this->MD_listePersonnels->calculerAgeEtStatut($perso->datedenaissance);
        $perso->age = $ageEtStatut['age'];
        $perso->statut = $ageEtStatut['statut'];
        // $data['persos'][] = $perso;
    }

    $this->load->view('ListePersonnels', $data);
    }
}