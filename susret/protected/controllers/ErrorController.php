<?php

class ErrorController extends Controller {
	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('error, accessDenied'),
				'users' => array('*')
			)
		);
	}
	
	public function actionError() {
		$this->render('error');
	}
	
	public function actionAccessDenied() {
		$this->render('accessDenied');
	}
}
