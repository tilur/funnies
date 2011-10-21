<?php

/**
 * The Funny Model.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Funny extends Model {

	static public function form_prepare() {
		$optUsers = Model_Funny::get_users();

		$formData = array(
			'sender' => array('name'=>'sender', 'id'=>'sender', 'options'=>$optUsers, 'selected'=>'', 'class'=>'red'),
			'receiver' => array('name'=>'receiver', 'id'=>'receiver', 'options'=>$optUsers, 'selected'=>'', 'class'=>'red'),
			'funny' => array('name'=>'funny', 'id'=>'funny', 'class'=>'red'),
			'context' => array('name'=>'context', 'id'=>'context', 'class'=>'red'),
			'btnSubmit' => array('name'=>'btnSubmit', 'id'=>'btnSubmit', 'value'=>'Share The Laughs', 'class'=>'red'),
			'btnCancel' => array('name'=>'btnCancel', 'id'=>'btnCancel', 'value'=>'Forget It', 'class'=>'last', 'onClick'=>'add_funnies(\'hide\');'),
			'btnAdd' => array('name'=>'btnAdd', 'id'=>'btnAdd', 'value'=>'Add A Funny', 'onClick'=>'add_funnies(\'show\');'),
		);

		return $formData;
	}

	static public function get_posts($sort=0) {
		try {
			$result = DB::query('
				SELECT f_body, u1.u_name sender, u2.u_name receiver
				FROM funnies
				INNER JOIN users AS u1 ON f_sender_id = u1.u_user_id
				LEFT JOIN users AS u2 ON f_receiver_id = u2.u_user_id
				ORDER BY '.($sort === 0 ? 'f_date_added' : 'f_votes').' DESC', DB::SELECT)->execute();
		}
		catch (Database_Exception $e) {
			$array[0]['f_body'] = 'Oops! No database connection';
			return $array;
		}

		return $result->as_array();
	}

	static public function get_users() {
		$optUsers[''] = '--';

		$query = DB::select()
			->from('users')
			->order_by('u_name');
		try {
			$result = $query->execute();		
		}
		catch (Database_Exception $e) {
			return $optUsers;
		}

		foreach ($result->as_array() AS $i => $user) {
			$optUsers[$user['u_user_id']] = $user['u_name'];
		}

		return $optUsers;
	}

	static public function display_posts($posts) {
		foreach ($posts AS $i => $post) {
			echo $post['f_body'].'<br>';
		}
		
	}
}

/* End of file welcome.php */