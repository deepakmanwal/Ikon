<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Users extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct()
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../uploads/user_pic/');
		$this->gallery_path_url= base_url()."uploads/user_pic";

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id, $activated)
	{
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by login (username or email)
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_login($login)
	{
		$this->db->where('LOWER(username)=', strtolower($login));
		$this->db->or_where('LOWER(email)=', strtolower($login));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
	function get_user_by_alternative_email($email)
	{
		$this->db->where('LOWER(alternative_email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
	function get_security_questions()
	{
		$data = $this->db->get_where('security_question',array('removed'=>'0'));
		return $data->result();
	}

	/**
	 * Get user record by username
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_username($username)
	{
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by email
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_email($email)
	{
		$this->db->where('LOWER(email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Check if username available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_username_available($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Check if email available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(email)=', strtolower($email));
		$this->db->or_where('LOWER(new_email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
			if ($activated)	$this->create_profile($user_id);
			return array('user_id' => $user_id);
		}
		return NULL;
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 *
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		if ($activate_by_email) {
			$this->db->where('new_email_key', $activation_key);
		} else {
			$this->db->where('new_password_key', $activation_key);
		}
		$this->db->where('activated', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('activated', 1);
			$this->db->set('new_email_key', NULL);
			$this->db->where('id', $user_id);
			$this->db->update($this->table_name);

			$this->create_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Purge table of non-activated users
	 *
	 * @param	int
	 * @return	void
	 */
	function purge_na($expire_period = 172800)
	{
		$this->db->where('activated', 0);
		$this->db->where('UNIX_TIMESTAMP(created) <', time() - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			$this->delete_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_password_key($user_id, $new_pass_key)
	{
		$this->db->set('new_password_key', $new_pass_key);
		$this->db->set('new_password_requested', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >', time() - $expire_period);

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1;
	}

	/**
	 * Change user password if password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass, $new_pass_key, $expire_period = 900)
	{
		$this->db->set('password', $new_pass);
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >=', time() - $expire_period);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Change user password
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function change_password($user_id, $new_pass)
	{
		$this->db->set('password', $new_pass);
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Set new email for user (may be activated or not).
	 * The new email cannot be used for login or notification before it is activated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->db->set($activated ? 'new_email' : 'email', $new_email);
		$this->db->set('new_email_key', $new_email_key);
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Activate new email (replace old email with new one) if activation key is valid.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		$this->db->set('email', 'new_email', FALSE);
		$this->db->set('new_email', NULL);
		$this->db->set('new_email_key', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_email_key', $new_email_key);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Update user login info, such as IP-address or login time, and
	 * clear previously generated (but not activated) passwords.
	 *
	 * @param	int
	 * @param	bool
	 * @param	bool
	 * @return	void
	 */
	function update_login_info($user_id, $record_ip, $record_time)
	{
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);

		if ($record_ip)		$this->db->set('last_ip', $this->input->ip_address());
		if ($record_time)	$this->db->set('last_login', date('Y-m-d H:i:s'));

		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
	}

	/**
	 * Ban user
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function ban_user($user_id, $reason = NULL)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 1,
			'ban_reason'	=> $reason,
		));
	}

	/**
	 * Unban user
	 *
	 * @param	int
	 * @return	void
	 */
	function unban_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 0,
			'ban_reason'	=> NULL,
		));
	}

	/**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 * @return	bool
	 */
	private function create_profile($user_id)
	{
		$this->db->set('user_id', $user_id);
		return $this->db->insert($this->profile_table_name);
	}

	/**
	 * Delete user profile
	 *
	 * @param	int
	 * @return	void
	 */
	private function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->profile_table_name);
	}
	/******Social Function****/
	public function check_user_by_email()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('alternative_email',$this->input->post('alternative_email'));
		$query=$this->db->get();
		return  $query->row_array();
	}
	function get_user_social_detail($resource)
	{
		$this->db->select('*');
		$this->db->from('usersSocio');
		$this->db->where($resource,$this->input->post('social_id'));
		$query=$this->db->get();
		return $query->row_array();
	}
	function get_user_social_id($user_id)
	{
		$this->db->select('*');
		$this->db->from('usersSocio');
		$this->db->where('userId',$user_id);
		$query=$this->db->get();
		return $query->row_array();
	}
	function update_user_social_detail($resource,$user_id)
	{
		$data	=	array(
						$resource	=>	$this->input->post('social_id')
						);
		$this->db->where('userId',$user_id);
		$this->db->update('usersSocio',$data);
	}
	function save_user_details($tableName,$data)
	{
		//echo $tableName;print_r($data);
		$this->db->insert($tableName,$data);
		return $this->db->insert_id();
	}
	function check_profile_detail($user_id)
	{
		
		$this->db->select("*");
		$this->db->from($this->profile_table_name);
		$this->db->where('user_id',$user_id);
		$query=$this->db->get();
		return $query->row_array();
	}
	function update_user_role($user_id,$id)
	{
		$role = base64_decode($id);
		$this->db->where('user_id',$user_id);
		$this->db->update($this->profile_table_name,array('role_id'=>$role));
	}
	function get_all_role()
	{
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where('removed','0');
		$data = $this->db->get();
		return $data->result();
	}
	function getRoleNameById($id){
		$this->db->select('role_name');
		$this->db->from('role');
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->result();
	}
	function get_fulldetails($userId)
	{
		$data = $this->db->get_where('users',array('id'=>$userId));
		return $data->row();
	}
	
	function update_profile($profile, $id){
		$this->db->where('id', $id);
		$update = $this->db->update($this->profile_table_name, array('work_edu' => $profile['work_edu'], 'professional_skill' => $profile['professional_skill'], 'about' => $profile['about'], 'current_city' => $profile['current_city'], 'hometown' => $profile['home_town']));
		return $update;
	}
	/*******End******/
	
	function update_profile_pic($user_id)
	{
		$config	=	array(
						'allowed_types'	=> 'jpg|jpeg|gif|png',
						'upload_path'	=>	$this->gallery_path,
						'file_name'		=>	'img_'.time().'_'.$user_id
							);
		//print_r($_FILES['profile_pic']);
		
		if($_FILES['profile_pic']['name']!='')									//file is selected
		{
			$this->load->library('upload',$config);
			$this->upload->overwrite	=	true;
			//var_dump($this->upload->do_upload('profile_pic'));
			//var_dump($this->upload->display_errors());
			if(!$this->upload->do_upload('profile_pic'))
			{
			//$this->session->set_flashdata('upload_error','error on uploading image');
			return $this->upload->display_errors();
			}
			else
			{
				$image_data=$this->upload->data();
				$config1	=	array(
								'source_image'	=>	$image_data['full_path'],
								'create_thumb'	=>	true,
								'new_image'		=>	$this->gallery_path. '/thumbs',
								'mantain_ration'=>	true,
								'width'			=>	230,
								'height'		=>	207
								);
				$this->load->library('image_lib',$config1);
				$this->image_lib->resize();
				$data['thumb_image_name'] = $image_data['raw_name'].'_thumb'.$image_data['file_ext'];
				if($image_data['file_name']!="")
				{
					$save=array(
								'profilePic'=>$image_data['file_name']// thumbnil image $data['thumb_image_name']
								);
					$this->db->where('userId',$this->tank_auth->get_user_id());
					$this->db->update('userProfile',$save);
				}
				
				return $image_data['raw_name'].'_thumb'.$image_data['file_ext']; 					//Returning Success full saving of profile pic and profile data
			} 
		}
	}
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */