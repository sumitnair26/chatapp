<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Chat_model
 *
 * @author Sumit Nair 23-11-2017
 */ 
 
 
class Chat_model extends CI_Model{

	 function __construct() {
        parent::__construct();
		
    }

   public function login()
   {
                 $title = "Login";
                 $mode = $_REQUEST["mode"];
              if ($mode == "login") 
			  {
              $username = trim($_POST['username']);
			  
	     $data = array (
		'username' =>  $username,
		);
	
		$this->db->insert('user', $data);
		$last_id = $this->db->insert_id();
		
			$this->session->set_userdata('userid', $last_id);
			$this->session->set_userdata('username',$username);
			redirect('chat/mychatroom','refresh');
			}
   }
   public function mychatroom()
   {
                  $userid=$this->session->userid;
				  $this->db->select('*')->from('relation');
				  $this->db->where('user_one',$userid);
				  $this->db->or_where('user_two',$userid);
				  $query=$this->db->get();
				  return $result = $query->result_array();
				 //$result = $query->result_array();
				 //echo "<pre>"; print_r($result);
   }
   public function allusers()
   {
                  $userid=$this->session->userid;
				  $this->db->select('*')->from('user');
				  $this->db->where('user_id !=',$userid);
				  $query=$this->db->get();
				  return $result = $query->result_array();
   }
   public function getallmsg()
   {
     $id = $_GET['id'];
	// echo $id;
	              $this->db->select('*')->from('chat');
				  $this->db->where('relation_id_fk',$id);
				  $this->db->join('user', 'chat.user_id_fk = user.user_id' , 'left');
				  $query=$this->db->get();
				//  return $result = $query->result_array();
				 $result = $query->result_array();
				$chat='';
				
				 foreach($result as $data )
				 {
				 $chat=$chat."<div id='getrecentmsg'><b><div style='color:red;'><span>" .$data['username']."</span> <span>" .':'. "</span></b>" ;
				 $chat=$chat."<p>".$data['msg']."</p></div>";
				  $chat=$chat."<hr>";
				//echo $data['msg'];
				
				 }
				$chat=$chat."</div><textarea id='newmsg' class='form-control' rows='5'></textarea>";
				$chat=$chat."<div><button class='btn btn-lg btn-success pull-right' onclick=sendmsg('".$data['relation_id_fk']."')>Send</button></div>";
				
				 echo $chat;
				//print_r($result);
   }
   public function insertnewchat()
   {
                  $userid=$this->session->userid;
                  $relationid=$_POST['id'];
				 $newmsg=$_POST['newmsg'];
				 
				 $data=array(
				 'user_id_fk'=>$userid ,
				 'relation_id_fk' =>$relationid ,
				 'msg' =>$newmsg
				 );
				 
				 //print_r($data);
				 //die;
				 
				 $this->db->insert('chat', $data);
   
   }
   public function startconversation()
   {
                $userid=$this->session->userid;
               $friendid=$_POST['friendid'];
			   $message=$_POST['message'];
			   $data=array(
			   'user_one'=>$userid,
			   'user_two'=>$friendid,
			   );
			   $this->db->insert('relation', $data);
			   $last_id = $this->db->insert_id();
			   
			   $msg=array(
				 'user_id_fk'=>$userid ,
				 'relation_id_fk' =>$last_id ,
				 'msg' =>$message
				 );
				 
				 
				 $this->db->insert('chat', $msg);
                redirect('chat/mychatroom','refresh');
   }
   
   
} //end
