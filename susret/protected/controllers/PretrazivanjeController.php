<?php

class PretrazivanjeController extends Controller {

	public function actionKorisnik() {
		$this->render('korisnik');
	}

	public function actionKorisnikRez() {
		if (isset($_POST["query"])) {
			$user = $_POST["query"];
			$user = addcslashes($user, '%_'); 
			$q = new CDbCriteria(array(
				'condition' => "userName LIKE :match", 
				'params' => array(':match' => "%$user%")  
					));
			$users = Korisnik::model()->findAll($q);
			$this->render("korisnikRez", array('users' => $users));
		}
	}
	
	public function actionTema() {
		$this->render('tema');
	}
	
	public function actionTemaRez() {
		if (isset($_POST["query"])) {
			$thread = $_POST["query"];
			$thread = addcslashes($thread, '%_'); // escape LIKE's special characters
			$q = new CDbCriteria(array(
				'condition' => "naziv LIKE :match", // no quotes around :match
				'params' => array(':match' => "%$thread%")  // Aha! Wildcards go here
					));
			$threads = Tema::model()->findAll($q);
			$this->render("temaRez", array('threads' => $threads));
		}
	}
	
	public function actionPost() {
		$this->render('post');
	}
	
	public function actionPostRez() {
		if (isset($_POST["query"])) {
			$post = $_POST["query"];
			$post = addcslashes($post, '%_'); // escape LIKE's special characters
			$q = new CDbCriteria(array(
				'condition' => "tekst LIKE :match", // no quotes around :match
				'params' => array(':match' => "%$post%")  // Aha! Wildcards go here
					));
			$posts = Post::model()->findAll($q);
			$this->render("postRez", array('posts' => $posts));
		}
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
