<?php

class ModerirajController extends Controller
{
	public function actionTema()
	{
		$user = Korisnik::model()->findByPk(Yii::app()->user->Id);
		$threads = Tema::model()->findAll('idPodforum=:id', array('id'=>$user->idPodforum));
		$this->render('tema', array('threads' => $threads));
	}
	public function actionPost() {
		$posts = Post::model()->findAll('idTema=:id', array('id'=>$_GET['id']));
		$this->render('post', array('posts'=>$posts));
	}
	
	public function actionDeleteTema() {
		Tema::model()->findByPk($_GET['idTema'])->delete();
		$this->actionTema();
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