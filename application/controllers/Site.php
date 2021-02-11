<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	private $site_info;

	public function __construct(){

		parent::__construct();

		//load model
		$this->load->model('site_model');
		$this->load->model('quiz_model');

		//get the site info
		$this->site_info = $this->site_model->getSiteInfo();


	}

	public function index()
	{
		
		$data['site'] = $this->site_info;

		//check if the performer cookie is exist
		if($this->_isCookieExist('performer')){
			$performer = $this->input->cookie('performer');
		}else{
			$performer = "";
		}

		$data['performer'] = $performer;

		if(!$this->_isCookieExist('question_id')){

			if($this->input->method() == "post"){

				//set username
            	$this->session->set_userdata('performer', $this->input->post('username'));
				
            	$data['page'] = "home";
				$data['questions'] = $this->site_model->getQuestionWithAns();

				//load the view
				$this->load->view('site/header', $data);
				$this->load->view('site/question');
				$this->load->view('site/footer'); 

			}else{

				//load the view
				$this->load->view('site/header', $data);
				$this->load->view('site/home');
				$this->load->view('site/footer');

			}// check post

		}else{

			$data['question_id'] = $this->input->cookie('question_id');
			$data['quiz'] = $this->site_model->getQuizByUID($data['question_id']);
			
			if($this->quiz_model->isQuizExist($data['question_id'])){


				//load the view
				$this->load->view('site/header', $data);
				$this->load->view('site/share');
				$this->load->view('site/footer');
			}else{

				delete_cookie('question_id');

				//load the view
				$this->load->view('site/header', $data);
				$this->load->view('site/home');
				$this->load->view('site/footer');
			}

			

		}

		
	}


	//check if cookie exist
	private function _isCookieExist($cookie_name){
		if($this->input->cookie($cookie_name)){
			return true;
		}else{
			return false;
		}
	}

	

	public function genResponse(){

		if($this->input->method() == "post"){

			$response = $this->input->post('response');
			$username = $this->session->performer;

			//unset session
			$this->session->unset_userdata('performer');
			$gen_response = $this->site_model->saveResponse($username, $response);
			
			if($gen_response){

				$cookie =   array(
					'name' => 'question_id',
					'expire' => time()+31556926,
					'value'=> $gen_response
				);
				$this->input->set_cookie($cookie);

				//get hash id
				$quiz = $this->site_model->getQuizByUID($gen_response);

				if($this->site_info->site_user_can_del == 1){
					$del_link = '<div class="custom-block"><a href="'.base_url('hash/'.$quiz->quiz_hash).'">You can delete this quiz by clicking here</a></div>';
				}else{
					$del_link = "";
				}

				echo '
					<div class="share-response">
						<!-- Start logo -->
						<div class="logo">
							<img src="'.base_url('assets/images/logo.png').'">
						</div> 
						<h2>Your Challenge is Ready</h2>
						<h3>Share this link with your friends</h3>
						<div>
							<span class="custom-input">
								<input type="text" value="'.base_url('quiz/'.$gen_response).'" readonly="'.$quiz->quiz_performer . trim($this->site_info->site_description).'" id="share-link"/>
							</span>
						</div>
						<div>
							<a class="custBtn" id="copyBtn">Copy This Link</a><br>
							<a class="btn btn-success mt-3 wp"
								href="whatsapp://send?text=🤗 '.$quiz->quiz_performer . ' '.trim($this->site_info->site_description).' '.base_url('quiz/'.$gen_response).'"
							>
								<img src="'.base_url('assets/images/wp.png').'">Send to whatsapp
							</a>
						</div>

						<div class="addthis-section">
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d510f600ce58cbc"></script>
			                <div class="addthis_inline_share_toolbox" 
			                	data-url="'.base_url('quiz/'.$gen_response).'"
			                	data-title="'.$quiz->quiz_performer . ' - ' . $this->site_info->site_title.'" 
			                	data-description="'.$quiz->quiz_performer . trim($this->site_info->site_description).'"
			                	data-media="'.base_url('assets/images/'.$this->site_info->site_og_image).'"
			                ></div>
						</div>
						'.$del_link.'
					</div><!-- End challenge ready  -->
				';
			}

		}
	}



	public function quiz($id = null){

		//if question id not present then redirect to main page
		if(!$id){
			redirect(base_url());
		}

		//get site details
		$data['site'] = $this->site_info;

		//check if quiz exist
		if($this->quiz_model->isQuizExist($id)){

			//get no of user perform the quiz
			$data['users'] = $this->site_model->getChallengeByQUID($id);
			
			//get guiz details
			$data['quiz'] = $this->site_model->getQuizByUID($id);
			
			$data['qPerformer'] = $data['quiz']->quiz_performer;

			//increase quiz view
			$this->site_model->increaseQuizView($id);


			//check if the answer cookie is exist
			if($this->_isCookieExist('q_ans_'.$id)){

				//get answer id from cookie
				$answer_id = $this->input->cookie('q_ans_'.$id);

				//get answer details
				$data['answer_details'] = $this->site_model->getAnswerById($answer_id);

				//get site details
				$data['page'] = 'result';

				$this->load->view('site/header', $data);
				$this->load->view('site/result');
				$this->load->view('site/footer');
			}
			//check if the cookie is exist
			else if($this->_isCookieExist('question_id')){

				//get question id from cookie
				$question_id = $this->input->cookie('question_id');

				$data['question_id'] = $this->input->cookie('question_id');

				

				//User is the owner of this quiz
				if($question_id == $id){

					//load the view
					$this->load->view('site/header', $data);
					$this->load->view('site/ownerView');
					$this->load->view('site/footer');
				}
				//if other user view
				else{

					//load the view
					$this->load->view('site/header', $data);
					$this->load->view('site/userView');
					$this->load->view('site/footer');
				}
			}
			//else redirect to home
			else{
				
				//load the view
				$this->load->view('site/header', $data);
				$this->load->view('site/userView');
				$this->load->view('site/footer');
			}
		}
		else{

			delete_cookie('q_ans_'.$id);

			//load the view
			$this->load->view('site/header', $data);
			$this->load->view('site/noquiz');
			$this->load->view('site/footer');
		}// end of quiz exist check

	}


	public function challenge($id){

		if(!$id){
			show_404();
		}

		if($this->input->method() == "post"){

			$data['page'] = "challenge";
			
			//get site details
			$data['site'] = $this->site_info;
			$data['quiz'] = $this->site_model->getQuizWithAns($id);
			$data['quiz_id'] = $id;
			$data['qPerformer'] = $this->site_model->getQuizByUID($id)->quiz_performer;

			//set username
            $this->session->set_userdata('challenger', $this->input->post('username'));

			//load the view
			$this->load->view('site/header', $data);
			$this->load->view('site/challenge');
			$this->load->view('site/footer');
		}else{
			redirect(base_url('quiz/'.$id));
		}
	}

	public function saveChallenge($id){

		if(!$id){
			show_404();
		}

		if($this->input->method() == "post"){

			$score = $this->input->post('score');
			$username = $this->session->challenger;
			$data['qPerformer'] = $this->site_model->getQuizByUID($id)->quiz_performer;
			$data['site'] = $this->site_info;
			$response = $this->site_model->saveChallenge($id, $username, $score);

			if($response){
				//get no of user perform the quiz
				$data['users'] = $this->site_model->getChallengeByQUID($id);

				//set username cookie
				$cookie =   array(
					'name' => 'performer',
					'expire' => time()+31556926,
					'value'=> $username
				);
				$this->input->set_cookie($cookie);

				//set question and answer id cookie
				$cookie =   array(
					'name' => 'q_ans_'.$id,
					'expire' => time()+31556926,
					'value'=> $response
				);
				$this->input->set_cookie($cookie);


				$this->load->view('site/return_result', $data);
			}
		}
	}


	public function aboutUs()
	{
		
		$data['site'] = $this->site_info;

		//load the view
		$this->load->view('site/header', $data);
		$this->load->view('site/about_us');
		$this->load->view('site/footer');
	}

	public function privacyPolicy()
	{
		
		$data['site'] = $this->site_info;

		//load the view
		$this->load->view('site/header', $data);
		$this->load->view('site/privacy_policy');
		$this->load->view('site/footer');
	}

	public function contactUs()
	{
		
		$data['site'] = $this->site_info;

		//load the view
		$this->load->view('site/header', $data);
		$this->load->view('site/contact_us');
		$this->load->view('site/footer');
	}


	public function hash($id){

		if(!$id){
			show_404();
		}

		if($this->site_model->delQuiz($id)){
			redirect(base_url());
		}
	}

	public function test(){
	
		$root = $_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http';
		//$root = "http://".$_SERVER['SERVER_NAME'];
		//$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		echo $_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http' . "://{$_SERVER['SERVER_NAME']}".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	}
}
