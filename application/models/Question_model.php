<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Question_model extends CI_Model{

	var $table = 'question';
    var $column = array(
        'question.q_id',
        'question.q_title',
        'question.q_ctitle',
        'question.q_status'
    );


    public function addQuestion($q_title){

        $data = array(
            'q_title' => $q_title
        );

        if($this->db->insert('question',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Question added successfully.
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


    public function editQuestion($id, $q_title){

        $data = array(
            'q_title' => $q_title,
        );

        $this->db->where('q_id', $id);
        if($this->db->update('question',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Question updated successfully.
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

    public function publishQuestion($id){

        $data = array(
            'q_status' => 1
        );

        $this->db->where('q_id', $id);
        if($this->db->update('question',$data)){
            return true;
        }else{
            return false;
        }
    }


    //get question by id
    public function getQuestionById($id){

        $this->db->where('q_id', $id);
        $query = $this->db->get('question');
        return $query->row();
    }

    //===================================For datatables====================================

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item)
        {
            if($this->input->post('search')['value']) {
                if ($i === 0){
                    $this->db->like($item, $this->input->post('search')['value']);
                }else {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }
            }
            $column[$i] = $item;
            $i++;
        }

        if($this->input->post('order'))
        {
            //echo $this->db->last_query();
            $this->db->order_by($column[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        }

        elseif(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {

        $this->_get_datatables_query();
        if($this->input->post('length') != -1){
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}