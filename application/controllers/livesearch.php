<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livesearch extends CI_Controller {

    function __Construct() {
        parent::__Construct();

        $this->load->model('Items');
    }

    public function index() {
        //$this->load->view('livesearch');
    }

    public function search() {

        $search_data = $_POST['search_data'];

        $query = $this->Items->get_live_items($search_data);

        foreach ($query as $row):
            echo "<li><a href='#' class='solTitle' rel='" . $row->id . "'>" . $row->serie . "</a></li>";
        endforeach;
            echo "<li><a href='#' class='solTitle' rel='0'>A designar</a></li>";
    }

}
