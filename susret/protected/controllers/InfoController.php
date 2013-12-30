<?php

class InfoController extends Controller
{
	public function actionIndex()
	{
		//mislim da je ovdi sve jasno...stvari koje mi trebaju, vadim iz baze
		//sintaksa svega je poprilično jasna
		$numOfUsers = Korisnik::model()->count();
		$numOfThreads = Tema::model()->count();
		$numOfPosts = Post::model()->count();
		
		$last24 = new CDbCriteria();
		$last24->condition = "DATE(vrijemePrijave) >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
		$users = Korisnik::model()->findAll($last24);
		
		$birth = new CDbCriteria();
		$birth->condition = "MONTH(datumRodjenja) = MONTH(CURDATE())";
		$birth->condition = "DAY(datumRodjenja) = DAY(CURDATE())";
		$bUsers = Korisnik::model()->findAll($birth);
		
		$stats = new CDbCriteria();
		$stats->condition = "DATE(vrijemePrijave) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
		$statUsers = Korisnik::model()->findAll($stats);
		$stat = count($statUsers);
		
		
		$this->render('index', 
				array(
					'users' => $numOfUsers,
					'threads' => $numOfThreads,
					'posts' => $numOfPosts,
					'active' => $users,
					'birth' => $bUsers,
					'stats' => $stat));
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