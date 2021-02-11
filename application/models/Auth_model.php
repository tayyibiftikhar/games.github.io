<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    Class Auth_model extends CI_Model{


        //Method Check login
        public function checkLogin($username, $password){

            //hash password
            $password = hash('sha256', $password);

            //prepare the query
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->from('admin');

            //query to database and return result
            $query  = $this->db->get();
            return $query->num_rows();
        }


        //check default pass
        public function checkDefaultPass(){

            //hash password
            $password = hash('sha256', 'admin');

            //prepare the query
            $this->db->where('password', $password);
            $this->db->from('admin');

            //query to database and return result
            $query  = $this->db->get();
            return $query->num_rows();
        }

    }
