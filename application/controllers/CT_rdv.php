<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_rdv extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 * 
	 */

	public function index() {

		$this->load->model('MD_rdv'); // Remplacez 'Disponibilite_model' par le nom de votre modèle
	
		// Appel à la méthode du modèle pour récupérer les horaires disponibles
		$id_personnel = $this->input->post('id_personnel');
		$id_candidat = $this->input->post('id_candidat');
		$id_dispo = $this->input->post('id_dispo');
		$horaires_dispo = $this->MD_rdv->get_horaires_disponibles();
		$horaires_non_dispo = $this->MD_rdv->get_horaires_non_disponibles();
	
		// Charger la vue et transmettre les données
		$data['horaires_dispo'] = $horaires_dispo;
		$data['horaires_non_dispo'] = $horaires_non_dispo;
		$data['id_personnel'] = $id_personnel; // Où $id_personnel est la valeur que vous souhaitez passer
		$data['id_candidat'] = $id_candidat; // Où $id_personnel est la valeur que vous souhaitez passer
		$data['id_dispo'] = $id_dispo; // Où $id_personnel est la valeur que vous souhaitez passer

		// $this->load->view('header');
		$this->load->view('rdv', $data);
	}

	public function confirmer_rdv() {

		 // Récupérer les ID depuis le formulaire
		 $horaire_id = $this->input->post('horaire_id');
		 $id_candidat = $this->input->post('id_candidat');
		 $id_dispo = $this->input->post('id_dispo');
		 $id_personnel = $this->input->post('id_personnel');
	 
		 // Insérer les données dans la table programme
		 $this->load->model('MD_rdv');
		 $this->MD_rdv->confirmer_rdv($horaire_id);
		 $this->MD_rdv->inserer_programme($id_candidat, $id_dispo, $id_personnel);
	 
		 // Rediriger vers la page de programme
		 redirect('CT_programme/afficher_programme/' . $horaire_id);

	}

	public function annuler_rdv(){
		// Récupérer l'identifiant de l'horaire à partir du formulaire
		$horaire_id = $this->input->post('horaire_id');
	
		// Mettre à jour la base de données pour marquer cet horaire comme non disponible
		$this->load->model('MD_rdv'); // Chargez le modèle Disponibilite_model
	
		// Appel à une méthode du modèle pour mettre à jour le statut "dispo"
		$this->MD_rdv->annuler_rdv($horaire_id);
	
		// Affichez un message de confirmation
		// echo "Rendez-vous annule !";

		// redirect('rdv');
	
	}
}
