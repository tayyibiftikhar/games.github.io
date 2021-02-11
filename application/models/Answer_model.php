<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Answer_model extends CI_Model{

    

    //get answer by question id
    public function getAnswerByQuestionId($id){
        $this->db->where('q_id', $id);
        $query = $this->db->get('answer');
        return $query->result();
    }

    //get answer by id
    public function getAnswerById($id){

        $this->db->where('a_id', $id);
        $query = $this->db->get('answer');
        return $query->row();
    }

    //add answer
    public function addAnswer($q_id, $a_text, $a_thumb){

        $data = array(
            'q_id' => $q_id,
            'a_text' => $a_text,
            'a_thumb' => $a_thumb
        );

        if($this->db->insert('answer',$data)){

            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Answer added successfully.
                        <a href="'.base_url('admin/question-answer/'.$q_id).'" class="btn btn-success">View</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }else{
            return '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Oh snap!</strong> Something went wrong when inserting.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }


    //edit answer
    public function editAnswer($id, $a_text, $a_thumb){

        $data = array(
            'a_text' => $a_text,
            'a_thumb' => $a_thumb
        );

        $this->db->where('a_id', $id);
        if($this->db->update('answer',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Answer updated successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }else{
            return '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Oh snap!</strong> Something went wrong when updating.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }
}