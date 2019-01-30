<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('fruits');
	}
	public function index()
	{
		$data = array();
		$data['pagename'] = 'index';
		$data["items"] = $this->db->get('fruit_table')->result();
		// var_dump($data);
		$this->load->view('welcome_message', $data);
	}

	public function showList() {
		$data = array();
		$data['pagename'] = 'index';
		$data["items"] = $this->db->get('fruit_table')->result();
		// var_dump($data);
		$this->load->view('welcome_message', $data);
	}

	public function detail() {
		// var_dump($this->uri->segment(2));
		$data = array();
		$data['pagename'] = 'Detail';
		$data['items'] = $this->fruits->getDetail($this->uri->segment(3));
		$data['id'] = $this->uri->segment(3);
		$this->load->view('detailView', $data);
	}

	public function addForm() {
		$data = array();
		$this->load->view('add_form', $data);
	}

	public function addItem() {
		$data = array('name' => $_REQUEST['name'], 'color' => $_REQUEST['color']);
		$this->db->insert('fruit_table', $data);
		header('Location:/index.php/welcome');
		// echo $_REQUEST['name'].' '.$_REQUEST['color'];
	}

	public function editForm() {
		$data = array();
		$data['items'] = $this->fruits->getDetail($this->uri->segment(3));
		$this->load->view('edit_form', $data);
	}

	public function editItem() {
		$data = array('name' => $_REQUEST['name'], 'color' => $_REQUEST['color']);
		$this->db->where('id', $_REQUEST['id']);
		$this->db->update('fruit_table', $data);
		header('Location:/index.php/welcome/detail/'.$_REQUEST['id']);
		// echo $_REQUEST['name'].' '.$_REQUEST['color'];
	}

	public function deleteItem() {
		// echo $this->uri->segment(3);
		$this->db->delete('fruit_table', array('id' => $this->uri->segment(3)));
		header('Location:/index.php/welcome');
	}
}
