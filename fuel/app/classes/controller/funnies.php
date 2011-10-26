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
class Controller_Funnies extends Controller_Base {

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
		$offset = Uri::segment(3) ? Uri::segment(3) : 0;
		$type = Uri::segment(2) == 'funniest' || !Uri::segment(2) ? 1 : 0;

		$data['type'] = $type;
		$data['offset'] = $offset;
		$data['posts'] = Model_Funny::get_posts($type, $perPage, $offset);
		$data['posts'] = View::factory('welcome/posts', $data);
		$data['pagination'] = Model_Funny::get_pagination($type, $perPage);
		$data['tabStatus']['funniest'] = ($type === 1 ? ' active' : '');
		$data['tabStatus']['recent'] = ($type === 0 ? ' active' : '');

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

	public function action_vote() {
		die('hi');
	}
}

/* End of file welcome.php */