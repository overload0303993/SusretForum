<?php

class PostController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';
	public $greskaPostTekst = "";

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
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array('moderator'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Post;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Post'])) {
			$model->attributes = $_POST['Post'];
			if (empty($model->tekst)) {
				$this->greskaPostTekst = "Post mora sadržavati barem 1 znak.";
				header("Location : " . Yii::app()->request->requestUri);
			} else if (strlen($model->tekst) > 10000) {
				$this->greskaPostTekst = "Post mora sadržavati manje od 10000 znakova.";
				header("Location : " . Yii::app()->request->requestUri);
			} else {
				$model->idTema = $_GET['idTema'];
				$model->idAutor = Yii::app()->user->id;
				if (isset($_GET['postId'])) {
					$model->idCitiran = $_GET['postId'];
				}
				$model->datumPost = new CDbExpression('NOW()');
				$user = Korisnik::model()->findByPk(Yii::app()->user->id);
				Korisnik::model()->updateByPk(Yii::app()->user->id, array('brojPostova' => $user->brojPostova + 1));
				if ($model->save()) {
					//preusmjeravam korisnika na zadnji post(taj koji je on napisao)
					$posts = Post::model()->findAll('idTema=:id', array(':id' => $model->idTema));
					$params = Parametri::model()->findByPk(1);
					$cntPost = count($posts);
					$page = ceil($cntPost / $params->vrijednost);
					$address = "/tema/" . $model->idTema . "?page=" . $page . "#" . $cntPost;
					$this->redirect(array($address));
				}
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Post'])) {
			$model->attributes = $_POST['Post'];
			if (empty($model->tekst)) {
				$this->greskaPostTekst = "Post mora sadržavati barem 1 znak.";
				header("Location : " . Yii::app()->request->requestUri);
			} else if (strlen($model->tekst) > 10000) {
				$this->greskaPostTekst = "Post mora sadržavati manje od 10000 znakova.";
				header("Location : " . Yii::app()->request->requestUri);
			} else {
				if ($model->save()) {
					$posts = Post::model()->findAll('idTema=:id', array(':id' => $model->idTema));
					$params = Parametri::model()->findByPk(1);
					$cntPost = count($posts);
					$page = ceil($cntPost / $params->vrijednost);
					$address = "/tema/" . $model->idTema . "?page=" . $page . "#" . $cntPost;
					$this->redirect(array($address));
				}
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		$this->redirect(Yii::app()->request->requestUri);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Post');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Post('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Post']))
			$model->attributes = $_GET['Post'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Post::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'post-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
