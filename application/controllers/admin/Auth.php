<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();


        //Load form validation library
        $this->load->library('form_validation');

        //load model
        $this->load->model("auth_model");
    }

    public function index(){

        //if already loggedin redirect to dashboard
        if(isset($this->session->userdata['isLoggedIn'])){
            redirect('admin');
        }

        //check if method is post
        if($this->input->method() == "post"){

            //get the post value
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            //set the validation rule
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Enter Password', 'required');

            if($this->form_validation->run() == FALSE){
                //Generate error msg
                $data['response'] = '<div class="alert alert-danger text-center" role="alert">username or password can\'t be blank</div>';

                //Load the login view
                $this->load->view('admin/login_view',$data);
            }else{

                //check emp_code and password is right
                $login_result = $this->auth_model->checkLogin($username, $password);

                //Check if user record is present or not
                if ($login_result > 0)
                {

                    //session data store in array
                    $sessiondata = array(
                        'isLoggedIn' => TRUE
                    );
                    //store the session variables
                    $this->session->set_userdata($sessiondata);

                    //redirect to dashboard
                    redirect('admin');
                }else
                {
                    //Generate error msg
                    $data['response'] = '<div class="alert alert-danger text-center" role="alert">Wrong credentials</div>';

                    //Load the login view
                    $this->load->view('admin/login_view',$data);
                }

            }
        }else{
            //Load the login view
            $this->load->view('admin/login_view');
        }
    }

    public function logout(){

        // Removing session data
        $sess = array('isLoggedIn');
        $this->session->unset_userdata($sess);

        redirect('admin/login');
    }
}