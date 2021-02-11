<?php

	Class Site_model extends CI_Model{

		public function getSiteInfo(){
			
			$this->db->where('id', 1);
			$query = $this->db->get('site');
			return $query->row();
		}

		

		public function getAllQuestion(){

			$this->db->order_by('q_id', 'RANDOM');
			$this->db->where('q_status', 1);
			$query = $this->db->get('question');
			return $query->result();
		}

		public function getAnsByQid($id){


			$this->db->where('q_id', $id);
			$this->db->order_by('a_id', 'RANDOM');
			$query = $this->db->get('answer');
			
			return $query->result();
		}

		public function getQuestionWithAns(){

			$qArray = [];
			$questions = $this->getAllQuestion();

			foreach ($questions as $q) {
				
				$qArray[] = (object) [
					'id' => $q->q_id,
					'question' => $q->q_title,
					'answer' => $this->getAnsByQid($q->q_id)
				];
			}
			return $qArray;
		}

		public function saveResponse($username, $response){

			while(1) {
	            $random_string = $this->_randString();
	            
	            $this->db->where('quiz_uid', $random_string);
	            $query = $this->db->get('quiz');
	            $result = $query->num_rows();

	            if($result < 1) {
	                break;
	            }
	        }

			$data = array(
				'quiz_uid' => $random_string,
				'quiz_performer' => $username,
				'quiz_data' => $response,
				'quiz_hash' => hash('sha256', microtime())
			);

			if($this->db->insert('quiz',$data)){
				return $random_string;
			}else{
				return false;
			}
		}

		//function randString
	    private function _randString(){
	        return substr(md5(time()), 0, 6);
	    }

	    public function getQuizByUID($id){
			
			$this->db->where('quiz_uid', $id);
			$query = $this->db->get('quiz');

			return $query->row();
		}


		public function getQuestionIn($ids){

			$ids = str_replace("'", "", $ids);

			$this->db->where('q_id IN ('.$ids.')');
			$query = $this->db->get('question');
			return $query->result();
		}

		public function getQuizWithAns($id){

			//get the quize data
			$quiz = $this->getQuizByUID($id);

			//quiz data
			$q_data = json_decode($quiz->quiz_data);


			//count no of quiz
			$quiz_count = count($q_data);


			//get question and answerid as comma seperated
			$q_ids = "";
			$a_ids = "";

			$qa_array = "{";
			foreach ($q_data as $key => $value) {
				foreach ($q_data[$key] as $k => $v) {
					$q_ids .= $k. ',';
					$a_ids .= $v. ',';

					$qa_array .= $k .':'. $v.',';
				}
			}
			$qa_array = trim($qa_array, ",");
			$qa_array .= '}';

			$q_ids = trim($q_ids, ",");
			$a_ids = trim($a_ids, ",");

			$a_array = explode(',', $a_ids);


			//generate questions
			$qArray = [];
			$questions = $this->getQuestionIn($q_ids);

			$i = 0;

			foreach ($questions as $q) {
				
				$qArray[] = (object) [
					'id' => $q->q_id,
					'question' => $q->q_title,
					'answer' => $this->getAnsByQid($q->q_id),
					'right' => $a_array[$i]
				];
				$i++;
			}

			return (object) [
				'quiz_count' => $quiz_count,
				'questions' => $qArray,
				'JSON' => $qa_array
			];
		}

		public function saveChallenge($id, $username, $score){
			$data = array(
				'quiz_uid' => $id,
				'c_score' => $score,
				'c_name' => $username
			);

			if($this->db->insert('challenge', $data)){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}

		public function getChallengeByQUID($id){

			$this->db->where('quiz_uid', $id);
			$query = $this->db->get('challenge');

			return $query->result();
		}

		public function getAnswerById($id){

			$this->db->where('c_id', $id);
			$query = $this->db->get('challenge');
			return $query->row();
		}

		public function increaseQuizView($id){
			
			$this->db->where('quiz_uid', $id);
			$this->db->set('quiz_view', "quiz_view+1", FALSE);
    		$this->db->update('quiz'); 

		}

		public function delQuiz($hash){

			$this->db->where('quiz_hash', $hash);
			$query = $this->db->delete('quiz');

			if($query){
				return true;
			}else{
				return false;
			}

		}

	}