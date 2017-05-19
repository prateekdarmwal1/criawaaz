<?php
/**
 * This ValidationBehavior is using for Captcha
 *
 */
class ValidationBehavior extends ModelBehavior {
   /**
    * This function will run before validation
	* @param $model
    */
	function beforeValidate(&$model) {
		die(' probando funcion de validacion ');
		$model->validate['recaptcha_response_field'] = array(
			'checkRecaptcha' => array(
				'rule' => array('checkRecaptcha', 'recaptcha_challenge_field'),
				'required' => true,
				'message' => 'You did not enter the words correctly. Please try again.',
			),
		);
	}
	/**
	 *This function is to check the captcha
	 *@param $model,$data,$target
	 *return $res
	 */
	function checkRecaptcha(&$model, $data, $target) {
		$publickey = '6LcbDu0SAAAAADjwM5xu9lbfmlBzJQAEeVoUSlvj';
		$res = recaptcha_check_answer(
			$publickey, 							$_SERVER['REMOTE_ADDR'],
			$model->data[$model->alias][$target], 	$data['recaptcha_response_field']
		);
		return $res->is_valid;
	}
}
