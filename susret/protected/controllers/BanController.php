<?php

class BanController extends Controller
{
	public function actionIndex()
	{
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		$this->render('index');
	}
	
	public function actionInter() {
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['id'])) {
			$user = Korisnik::model()->findByPk($_POST['id']);
			$this->render('inter', array('user' => $user));
		}
 	}
	
	public function actionBanned() {
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['banDate']) && isset($_POST['id'])) {
			$ban = new Ban;
			$ban->datumIsteka = $_POST['banDate'];
			$ban->idKorisnik = intval($_POST['id']);
			$ban->save();
		}
		$this->render('index');
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