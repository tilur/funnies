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
		$query = DB::select()	
			->from('funnies');
		
		if ($sort === 0) { $query->order_by('f_date_added','desc'); }
		elseif ($sort === 1) { $query->order_by('f_votes','desc'); }
		
		$result = $query->execute();
		
		return $result->as_array();
	}

	static public function get_users() {
		$query = DB::select()
			->from('users')
			->order_by('u_name');
		$result = $query->execute();

		$optUsers[''] = '--';
		foreach ($result->as_array() AS $i => $user) {
			$optUsers[$user['u_user_id']] = $user['u_name'];
		}

		return $optUsers;
	}
}

/* End of file welcome.php */