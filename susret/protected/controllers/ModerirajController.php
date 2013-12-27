<?php

class ModerirajController extends Controller
{
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('tema, post'),
				'roles'=>array('moderator'),
			),
		);
	}
	
	
	public function actionTema()
	{
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('moderator')) {
			$this->redirect('/susret/error/accessDenied');
		}
		$user = Korisnik::model()->findByPk(Yii::app()->user->Id);
		$threads = Tema::model()->findAll('idPodforum=:id', array('id'=>$user->idPodforum));
		$this->render('tema', array('threads' => $threads));
	}
	
	public function actionPost() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('moderator')) {
			$this->redirect('/susret/error/accessDenied');
		}
		$posts = Post::model()->findAll('idTema=:id', array('id'=>$_POST['id']));
		$this->render('post', array('posts'=>$posts, 'curThread' => $_POST['id']));	
	}
	
	public function actionDeleteTema() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('moderator')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['idTema'])) {
			$thread = Tema::model()->findByPk($_POST['idTema']);
			if($thread) {
				$thread->delete();
			}
		}
		$this->actionTema();
	}
	
	public function actionDeletePost() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('moderator')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['idPost'])) {
			$post = Post::model()->findByPk($_POST['idPost']);
			if($post) {
				$post->delete();
			}
		}
		$this->actionPost();
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