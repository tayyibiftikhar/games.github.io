<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Admin_model extends CI_Model{

    public function getSiteInfo(){
        
        $this->db->where('id', 1);
        $query = $this->db->get('site');
        return $query->row();
    }

    //get stat
    public function getStat(){
        $query = $this->db->get('question');
        $question = $query->num_rows();

        $query = $this->db->get('quiz');
        $quiz = $query->num_rows();

        $this->db->select_sum('quiz_view');
        $query = $this->db->get('quiz');
        $views = $query->row()->quiz_view;

        return (object)[
            'question' => $question,
            'quiz'     => $quiz,
            'views'    => $views
        ];
    }

    //edit answer
    public function updateSite($site_title, $site_short_title, $site_wishing_web, $site_description, $site_user_can_del, $filename){

        $data = array(
            'site_title' => $site_title,
            'site_short_title' => $site_short_title,
            'site_wishing_web' => $site_wishing_web,
            'site_description' => $site_description,
            'site_user_can_del' => $site_user_can_del
        );

        if($filename){
            $data['site_og_image'] = $filename;
        }

        $this->db->where('id', 1);
        if($this->db->update('site',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Site updated successfully.
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


    //update header footer
    public function updateHeaderFooter($site_custom_header, $site_custom_footer){

        $data = array(
            'site_custom_header' => $site_custom_header,
            'site_custom_footer' => $site_custom_footer
        );


        $this->db->where('id', 1);
        if($this->db->update('site',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Site updated successfully.
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


    //update page
    public function updatePage($site_contact, $site_about, $site_privacy){

        $data = array(
            'site_contact' => $site_contact,
            'site_about' => $site_about,
            'site_privacy' => $site_privacy
        );


        $this->db->where('id', 1);
        if($this->db->update('site',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Site updated successfully.
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


    //update account
    public function updateAccount($username, $password){

        $error = 0;
        
        if($username){
            $data['username'] = $username;
            $error++;
        }
        if($password){
            $data['password'] = hash('sha256', $password);
            $error++;
        }

        if($error){
            $this->db->where('id', 1);
                if($this->db->update('admin',$data)){
                    return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                <strong>Well done!</strong> Account updated successfully.
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
        }else{

            return '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>Oh snap!</strong> You have not put anything to update.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }


        $this->db->where('id', 1);
        if($this->db->update('site',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Site updated successfully.
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
    
    //update ad
    public function updateAd($site_ad_ver, $site_ad_100){

        $data = array(
            'site_ad_ver' => $site_ad_ver,
            'site_ad_100' => $site_ad_100
        );


        $this->db->where('id', 1);
        if($this->db->update('site',$data)){
            return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Well done!</strong> Ad updated successfully.
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