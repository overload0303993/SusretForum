<?php

class BanController extends Controller
{
	public function actionIndex()
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
		$criteria->addCondition('DATE(datumIsteka) > CURDATE()');
		$banned = Ban::model()->findAll($criteria);
		$this->render('index', array('banned' => $banned));
	}
	
	public function actionInter() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['id'])) {
			$user = Korisnik::model()->findByPk($_POST['id']);
			$this->render('inter', array('user' => $user));
		}
 	}
	
	public function actionBanned() {
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		if(!Yii::app()->user->checkAccess('istrazivac')) {
			$this->redirect('/susret/error/accessDenied');
		}
		if(isset($_POST['banDate']) && !empty($_POST['banDate']) && isset($_POST['id'])) {
			$ban = new Ban;
			$ban->datumIsteka = date('Y-m-d', strtotime($_POST['banDate']));
			$ban->idKorisnik = intval($_POST['id']);
			$ban->save();
		} else if(isset ($_POST['id'])) {
			$ban = new Ban;
			$ban->datumIsteka = date('Y-m-d', strtotime('2037-12-31'));
			$ban->idKorisnik = intval($_POST['id']);
			$ban->save();
		}
		$this->actionIndex();
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