<?php

/**
 * The Funny Model.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Funny extends Model {

	static public function form_prepare() {
		$formData = array(
			'sender' => array('name'=>'sender', 'id'=>'sender', 'options'=>array('1'=>'one', '2'=>'two'), 'class'=>'red'),
			'receiver' => array('name'=>'receiver', 'id'=>'receiver', 'class'=>'red'),
			'funny' => array('name'=>'funny', 'id'=>'funny', 'class'=>'red'),
			'context' => array('name'=>'context', 'id'=>'context', 'class'=>'red'),
			'btnSubmit' => array('name'=>'btnSubmit', 'id'=>'btnSubmit', 'value'=>'Share The Laughs', 'class'=>'red'),
			'btnCancel' => array('name'=>'btnCancel', 'id'=>'btnCancel', 'value'=>'Forget It', 'class'=>'last', 'onClick'=>'add_funnies(\'hide\');'),
			'btnAdd' => array('name'=>'btnAdd', 'id'=>'btnAdd', 'value'=>'Add A Funny', 'onClick'=>'add_funnies(\'show\');'),
		);

		return $formData;
	}
}

/* End of file welcome.php */