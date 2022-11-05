<?php

/**
 * @class      LoginForm
 *
 * This is the data structure for login form data. It is used by the 'login' action of 'SiteController'.
 *
 * @author     Developer
 * @copyright  PLS 3rd Learning, Inc. All rights reserved.
 */
class LoginForm extends CFormModel {

	/** @var string $username */
	public $username;

	/** @var string $password */
	public $password;

	/** @var string $rememberMe */
	public $rememberMe;

	/** @var UserIdentity $_identity */
	private $_identity;

	/**
	 * Declares the validation rules.
	 *
	 * @return string[][]
	 */
	public function rules() {
		return [
			['username, password', 'required'],
			['rememberMe', 'boolean'],
			['password', 'authenticate'],
		];
	}

	/**
	 * Declares the attribute labels.
	 *
	 * @return string[]
	 */
	public function attributeLabels() {
		return [
			'rememberMe' => 'Remember me next time',
		];
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 *
	 * @param string $attribute the name of the attribute to be validated.
	 * @param array  $params    additional parameters passed with rule when being executed.
	 *
	 * @return void
	 * @throws CException
	 */
	public function authenticate($attribute, $params) {
		$this->_identity = new UserIdentity($this->username, $this->password);
		if (!$this->_identity->authenticate()) {
			$this->addError('password', 'Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 *
	 * @return bool whether login is successful
	 * @throws CException
	 */
	public function login() {
		if ($this->_identity === NULL) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration = $this->rememberMe ? (3600 * 24 * 30) : 0;
			Yii::app()->user->login($this->_identity, $duration);
			return TRUE;
		}
		return FALSE;
	}
}
