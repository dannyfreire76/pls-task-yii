<?php

/**
 * @class      ContactForm
 *
 * This is the data structure for contact form data. It is used by the 'contact' action of 'HelpController'.
 *
 * @author     Developer
 * @copyright  PLS 3rd Learning, Inc. All rights reserved.
 */
class ContactForm extends CFormModel {

	/** @var string $name */
	public $name;

	/** @var string $email */
	public $email;

	/** @var string $subject */
	public $subject;

	/** @var string $body */
	public $body;

	/** @var string $verifyCode */
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			['name, email, subject, body', 'required'],
			['email', 'email'],
			['verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()],
		];
	}

	/**
	 * Declares customized attribute labels.
	 *
	 * @return string[]
	 */
	public function attributeLabels() {
		return [
			'verifyCode' => 'Verification Code',
		];
	}
}