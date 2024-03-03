<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->isLoggedIn();
    }

    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            $this->load->view('login');
        } else {
            redirect('/dashboard');
            // redirect('bienvenido');
        }
    }

    public function loginMe()
    {   
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|xss_clean|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|');

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $email          = $this->input->post('email');
            $password       = $this->input->post('password');
            $ecryptPassword = md5($password);
            
            $result = $this->login_model->loginMe($email, $ecryptPassword);
            
            if(count($result) > 0){
                foreach ($result as $res) {
                    $sessionArray = array('userId'=>$res->id_usuario,
                                            'role'=>$res->id_role,
                                            'roleText'=>$res->role,
                                            'name'=>$res->name ,
                                            'nombre'=>$res->nombre,
                                            'apellido'=>$res->apellido,
                                            'isLoggedIn' => TRUE
                                    );
                                        
                    $this->session->set_userdata($sessionArray);
                    redirect('dashboard');
                    // redirect('bienvenido');
                }
            } else {
                $this->session->set_flashdata('error', 'El correo electrónico y/o clave son incorrectas, vuelva a intentarlo.');

                redirect('/login');
            }
        }
    }
}

?>
