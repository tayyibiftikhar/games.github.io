<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Quiz_model extends CI_Model{

	var $table = 'quiz';
    var $column = array(
        'quiz.quiz_id',
        'quiz.quiz_uid',
        'quiz.quiz_performer',
        'quiz.quiz_view'
    );


    //del quiz
    public function delQuiz($id){

        $this->db->where('quiz_id', $id);
        if($this->db->delete('quiz')){
            return true;
        }else{
            return false;
        }
    }

    //check is quiz exist
    public function isQuizExist($id){

        $this->db->where('quiz_uid', $id);
        $query = $this->db->get('quiz');
        return $query->num_rows();
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