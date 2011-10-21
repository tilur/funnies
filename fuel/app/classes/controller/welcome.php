<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Base {

	/**
	 * The index action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$data['formData'] = Model_Funny::form_prepare();

		$perPage = 2;
		$data['posts']['recent'] = View::factory('welcome/posts', array('posts'=>Model_Funny::get_posts(0, $perPage)));
		$data['posts']['funniest'] = View::factory('welcome/posts', array('posts'=>Model_Funny::get_posts(1, $perPage)));
		$data['pagination'] = Model_Funny::get_pagination($perPage);

		$this->_view->content = View::factory('welcome/index', $data, false);
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->response->body = View::factory('welcome/404', $data);
	}
}

/* End of file welcome.php */