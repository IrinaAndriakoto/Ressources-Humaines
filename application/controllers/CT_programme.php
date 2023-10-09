<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_programme extends CI_Controller {

    public function afficher_programme($id_horaire){
        $this->load->model('MD_programme');
    
        // Récupérez les données du programme correspondantes à l'ID de l'horaire
        $programme_data = $this->MD_programme->get_programme_data($id_horaire);
    
        // Vous n'avez pas besoin de récupérer à nouveau l'ID de l'horaire depuis l'URL
        $id_horaire = $this->input->post('id_horaire');
    
        $data['programme_data'] = $programme_data;
    
        var_dump($programme_data);
        $this->load->view('programme', $data);
    }
}
