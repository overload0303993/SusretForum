<?php

class LoginController extends Controller
{

	public $layout='//layouts/column1';
	public $error = "";
	public function actionIndex()
	{
		$model=new Login;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['Login'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				Korisnik::model()->updateByPk(Yii::app()->user->id, array('vrijemePrijave' => new CDbExpression('NOW()')));
				$this->redirect(Yii::app()->user->returnUrl);
			} else {
				$this->error = "Krivo korisničko ime ili lozinka.";
			}
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}
	
	public function actionLogout()
	{
		$user = Korisnik::model()->findByPk(Yii::app()->user->id);
		Korisnik::model()->updateByPk(Yii::app()->user->id, array('vrijemeOdjave' => new CDbExpression('NOW()')));
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionError()
	{
		 $error = Yii::app()->errorHandler->error;
		 if ($error)
			 $this->render('error', array('error'=>$error));
		 else
			throw new CHttpException(404, 'Page not found.');
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}