<?php

class ParamController extends Controller
{
	public function actionIndex($note = "")
	{
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		$criteria = new CDbCriteria();
		$criteria->addCondition('rola = 1');
		$criteria->addCondition('rola != 3');
		$userss = Korisnik::model()->findAll($criteria);
		$users = array();
		foreach($userss as $user) {
			$criteria = new CDbCriteria();
			$criteria->addCondition('DATE(datumIsteka) > CURDATE()');
			$criteria->addCondition('idKorisnik = ' . $user->id);
			if(!Ban::model()->find($criteria)) {
				$users[] = $user;
			}
		}
		$this->render('index', array('users' => $users, 'note' => $note));
	}
	
	public function actionChange()
	{
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['tema']) && intval($_POST['tema']) != -1) {
			$model = Parametri::model()->findByPk(1);
			$model->setAttribute('vrijednost', intval($_POST['tema']));
			$model->save();
		}
		if(isset($_POST['potpis']) && intval($_POST['potpis']) != -1) {
			$model = Parametri::model()->findByPk(2);
			$model->setAttribute('vrijednost', intval($_POST['potpis']));
			$model->save();
		}
		$this->actionIndex('Parametri promijenjeni!');
	}
	
	public function actionMod() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		$userId = $_POST['id'];
		$user = Korisnik::model()->findByPk($userId);
		$user->setAttribute('rola', 2);
		$user->save();
		$note = 'Dodjeljena moderatura korisniku <b><i>' . $user->userName . '</i></b>';
		$this->actionIndex($note);
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