<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //if user no logged in redirect to login
        if(!isset($this->session->userdata['isLoggedIn'])){
           redirect('admin/login');
        }

        //load the model
        $this->load->model('auth_model');
        $this->load->model('admin_model');
        $this->load->model('site_model');
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->load->model('answer_model');

    }


    public function index(){
        
        $error = "";
        $default_pass = $this->auth_model->checkDefaultPass();

        $data['stat'] = $this->admin_model->getStat();
        
        if(file_exists('install')){
            $error .='<li>Install directory present. Delete it.</li>';
        }
        if($default_pass>=1){
            $error .= "<li>Kindly change default password!</li>";
        }

        $data['error'] = $error;

        //Load the views
        $this->load->view("admin/header",$data);
        $this->load->view("admin/home");
        $this->load->view("admin/footer"); 
    }

    //show quiz
    public function quiz(){

        //Load the views
        $this->load->view("admin/header");
        $this->load->view("admin/quiz");
        $this->load->view("admin/footer"); 
    }

    //list quiz
    public function listQuiz(){
        $list = $this->quiz_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        foreach ($list as $quiz) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $quiz->quiz_uid;
            $row[] = $quiz->quiz_performer;
            $row[] = $quiz->quiz_view;
            $row[] = '<a href="'.base_url("admin/del-quiz/".$quiz->quiz_id).'" class="btn btn-danger btn-sm p-1 mb-1 text-white" id="delQuiz">Del</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->quiz_model->count_all(),
            "recordsFiltered" => $this->quiz_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    // delete quiz
    public function delQuiz($id){
        if($this->quiz_model->delQuiz($id)){
            echo 'Quiz deleted successfully';
        }
    }


    //view question
    public function question(){
        

        //Load the views
        $this->load->view("admin/header");
        $this->load->view("admin/question");
        $this->load->view("admin/footer"); 
    }


    //list quiz
    public function listQuestion(){
        $list = $this->question_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        foreach ($list as $question) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $question->q_title;
            $row[] = '<a href="'.base_url("admin/question-answer/".$question->q_id).'" class="btn btn-warning btn-sm p-1 mb-1 text-white">View</a>';
            $row[] = $question->q_status == 0 ? '<span class="badge badge-danger">No</span>' : '<span class="badge badge-success">Yes</span>';

            $row[] = '
            <a href="'.base_url("admin/edit-question/".$question->q_id).'" class="btn btn-success btn-sm p-1 mb-1 text-white">Edit</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->question_model->count_all(),
            "recordsFiltered" => $this->question_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    //add question
    public function addQuestion(){

        $msg="";
        
        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $q_title =  $this->input->post('q_title');

            $msg = $this->question_model->addQuestion($q_title);
        }

        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header",$data);
        $this->load->view("admin/add_question");
        $this->load->view("admin/footer");
    }

    //edit question
    public function editQuestion($id){

        $msg="";
        
        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $q_title =  $this->input->post('q_title');

            $msg = $this->question_model->editQuestion($id, $q_title);
        }

        $data['q'] = $this->question_model->getQuestionById($id);
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header",$data);
        $this->load->view("admin/edit_question");
        $this->load->view("admin/footer");
    }


    //grt the answer of the question
    public function questionAnswer($id){
        
        if(!$id){
            show_404();
        }
        
        $data['question'] = $this->question_model->getQuestionById($id);
        $data['answer'] = $this->answer_model->getAnswerByQuestionId($id);

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/question_answer");
        $this->load->view("admin/footer"); 
    }


    //add answer
    public function addAnswer($id){


        $msg="";

        //Check if method is post
        if($this->input->method() == "post")
        {
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = uniqid("IMG_");

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('a_thumb'))
            {
                $data['msg'] = $this->upload->display_errors();
            }
            else
            {
                $upload_data = $this->upload->data();
                $data['msg'] = $upload_data['file_name'];
                
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/'.$upload_data['file_name'];
                $config['maintain_ratio'] = false;
                $config['width']     = '200';
                $config['height']    = '200';
                $config['quality']   = '40%';

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                //store all post value
                $a_text =  $this->input->post('a_text');
                $msg = $this->answer_model->addAnswer($id, $a_text, $upload_data['file_name']);

                $this->question_model->publishQuestion($id);
            }

        }

        $data['q'] = $this->question_model->getQuestionById($id);
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header",$data);
        $this->load->view("admin/add_answer");
        $this->load->view("admin/footer");
    }

    //edit answer
    public function editAnswer($id){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = uniqid("IMG_");

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('a_thumb'))
            {
                $data['msg'] = $this->upload->display_errors();
            }
            else
            {
                $upload_data = $this->upload->data();
                $data['msg'] = $upload_data['file_name'];
                
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/'.$upload_data['file_name'];
                $config['maintain_ratio'] = false;
                $config['width']     = '200';
                $config['height']    = '200';
                $config['quality']   = '50%';

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                $old_image = $this->answer_model->getAnswerById($id)->a_thumb;
                if($old_image){
                    unlink('./upload/'.$old_image);
                }

                //store all post value
                $a_text =  $this->input->post('a_text');

                $msg = $this->answer_model->editAnswer($id, $a_text, $upload_data['file_name']);
            }

        }

        $data['ans'] = $this->answer_model->getAnswerById($id);
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header",$data);
        $this->load->view("admin/edit_answer");
        $this->load->view("admin/footer");
    }


    public function siteSettings(){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {

            $filename = "";

            if($_FILES AND $_FILES['site_og_image']['name'] ){
                
                $filename = uniqid("IMG_");

                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 1024;
                $config['file_name']            = $filename;
                $config['maintain_ratio']       = false;
                $config['width']                = '1200';
                $config['height']               = '1200';


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('site_og_image'))
                {
                    $data['msg'] = $this->upload->display_errors();
                    $filename = "";

                }
                else
                {
                    $upload_data = $this->upload->data();

                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/'.$upload_data['file_name'];
                    $config['new_image'] = './assets/images/'.$upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['thumb_marker'] = '_thumb';
                    $config['maintain_ratio'] = false;
                    $config['width']     = '200';
                    $config['height']    = '200';
                    $config['quality']   = '70%';


                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $old_image = $this->admin_model->getSiteInfo()->site_og_image;
                    if($old_image){
                        $path_parts = pathinfo('assets/images/'.$old_image);
                        @unlink('assets/images/'.$path_parts['filename'].'_thumb.'.$path_parts['extension']);
                        @unlink('assets/images/'.$old_image);
                    }

                    $filename = $upload_data['file_name'];
                    
                }
            }//end of upload check

            //store all post value
            $site_title =  $this->input->post('site_title');
            $site_short_title =  $this->input->post('site_short_title');
            $site_wishing_web =  $this->input->post('site_wishing_web');
            $site_description =  trim($this->input->post('site_description'));
            $site_user_can_del =  $this->input->post('site_user_can_del') == null ? 0 : 1;

            $msg = $this->admin_model->updateSite($site_title, $site_short_title, $site_wishing_web, $site_description, $site_user_can_del, $filename);
        }//end of post

        $data['site'] = $this->admin_model->getSiteInfo();
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/site_settings");
        $this->load->view("admin/footer"); 
    }


    public function changeLogo(){

        $msg = "";
        //Check if method is post
        if($this->input->method() == "post")
        {
            
            $config['upload_path']          = './assets/images/';
            $config['allowed_types']        = 'png';
            $config['max_size']             = 1024;
            $config['file_name']            = 'logo';
            $config['overwrite']            = TRUE;



            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo'))
            {
                $msg = $this->upload->display_errors();

            }else{
                $upload_data = $this->upload->data();

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/'.$upload_data['file_name'];
                $config['new_image'] = './assets/images/favicon.png';
                $config['maintain_ratio'] = false;
                $config['width']     = '60';
                $config['height']    = '60';

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Logo uploaded successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }//end of upload check
        }//end of post check

        $data['msg'] = $msg;
        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/change_logo");
        $this->load->view("admin/footer"); 
    }


    public function customHeaderFooter(){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $site_custom_header =  trim($this->input->post('site_custom_header'));
            $site_custom_footer =  trim($this->input->post('site_custom_footer'));

            $msg = $this->admin_model->updateHeaderFooter($site_custom_header, $site_custom_footer);
            
        }//end of post

        $data['site'] = $this->admin_model->getSiteInfo();
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/custom_header_footer");
        $this->load->view("admin/footer"); 
    }

    public function page(){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $site_contact =  trim($this->input->post('site_contact'));
            $site_about =  trim($this->input->post('site_about'));
            $site_privacy =  trim($this->input->post('site_privacy'));

            $msg = $this->admin_model->updatePage($site_contact, $site_about, $site_privacy);
            
        }//end of post


        

        $data['site'] = $this->admin_model->getSiteInfo();
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/page");
        $this->load->view("admin/footer"); 
    }


    public function account(){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');

            $msg = $this->admin_model->updateAccount($username, $password);
            
        }//end of post

        $data['site'] = $this->admin_model->getSiteInfo();
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/account");
        $this->load->view("admin/footer"); 
    }


    //ad settings
    public function adSettings(){

        $msg="";


        //Check if method is post
        if($this->input->method() == "post")
        {
            //store all post value
            $site_ad_ver =  trim($this->input->post('site_ad_ver'));
            $site_ad_100 =  trim($this->input->post('site_ad_100'));

            $msg = $this->admin_model->updateAd($site_ad_ver, $site_ad_100);
            
        }//end of post

        $data['site'] = $this->admin_model->getSiteInfo();
        $data['msg'] = $msg;

        //Load the views
        $this->load->view("admin/header", $data);
        $this->load->view("admin/ad_settings");
        $this->load->view("admin/footer"); 
    }

}

