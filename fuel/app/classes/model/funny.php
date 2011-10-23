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

	static public function get_posts($sort=0, $limit=10) {
		try {
			$result = DB::query(Model_Funny::build_posts_select($sort, $limit), DB::SELECT)->execute();
			/*
			$result = DB::query('
				SELECT f_funnies_id, f_sender_id, f_receiver_id, f_body, f_context, f_votes, f_date_added, u1.u_name sender, u2.u_name receiver
				FROM funnies
				INNER JOIN users AS u1 ON f_sender_id = u1.u_user_id
				LEFT JOIN users AS u2 ON f_receiver_id = u2.u_user_id
				ORDER BY '.($sort === 0 ? 'f_date_added' : 'f_votes').' DESC
				LIMIT '.$limit, DB::SELECT)->execute();
			*/
		}
		catch (Database_Exception $e) {
			$array[0]['f_body'] = 'Oops! No database connection';
			return $array;
		}

		return $result->as_array();
	}

	static public function get_pagination($perPage) {
		$config = array(
		    'pagination_url' => 'javascript::ding(',
		    'total_items' => Model_Funny::get_posts_count(),
		    'per_page' => $perPage,
		    'uri_segment' => 3,
		    'template' => array(
		        'wrapper_start' => '<center><div class="pagination">',
				'wrapper_end' => '</div></center>',
				'page_start' => ' ',
		        'page_end' => ' ',
		        'previous_start' => ' ',
		        'previous_end' => ' ',
		        'previous_mark' => '',
		        'next_start' => ' ',
		        'next_end' => ' ',
		        'next_mark' => '',
		        'active_start' => ' ',
		        'active_end' => ' ',
		    ),
		);

		Pagination::set_config($config);

		return Pagination::create_links();
	}

	static public function get_posts_count() {
		$result = DB::query(Model_Funny::build_posts_select(0, 0))->execute();

		return count($result->as_array());
	}

	static private function build_posts_select($sort=0, $limit=10, $offset=0) {
		$query = 'SELECT f_funnies_id, f_sender_id, f_receiver_id, f_body, f_context, f_votes, f_date_added, u1.u_name sender, u2.u_name receiver
			FROM funnies
			INNER JOIN users AS u1 ON f_sender_id = u1.u_user_id
			LEFT JOIN users AS u2 ON f_receiver_id = u2.u_user_id
			ORDER BY '.($sort === 0 ? 'f_date_added' : 'f_votes').' DESC';
		
		if ($limit !== 0) {
			$query .= ' LIMIT '.$limit;
		}
		if ($offset !== 0) {
			$query .= ' OFFSET '.$offset;
		}

		return $query;
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