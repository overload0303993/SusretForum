<?php

class TemaController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';
	public $greskaTema = "";
	public $greskaPost = "";

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
				'users' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
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
		$dataProvider = new CActiveDataProvider('Post', array(
		'pagination' => array(
		'pageSize' => Parametri::model()->findByPk(1)->vrijednost,
		),
		'criteria' => array(
		'condition' => 'idTema=' . $id,
		)));
		$this->render('view', array(
			'model' => $this->loadModel($id),
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Tema;
		$post = new Post;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Tema'])) {
			$model->attributes = $_POST['Tema'];
			$post->attributes = $_POST['Post'];
			if (empty($model->naziv)) {
				$this->greskaTema = "Morate unijeti naziv teme.";
				header("Location : " . Yii::app()->request->requestUri);
			} elseif (empty($post->tekst)) {
				$this->greskaPost = "Morate unijeti tekst posta.";
				header("Location : " . Yii::app()->request->requestUri);
			} else {
				$post->datumPost = new CDbExpression('NOW()');
				$post->idAutor = Yii::app()->user->id;
				$user = Korisnik::model()->findByPk(Yii::app()->user->id);
				Korisnik::model()->updateByPk(Yii::app()->user->id, array('brojPostova' => $user->brojPostova + 1));
				$model->brojPregleda = 0;
				$model->idAutor = Yii::app()->user->id;
				$model->idPodforum = $_GET['pdfId'];
				if ($model->save()) {
					$post->idTema = $model->id;
					if ($post->save()) {
						$this->redirect(array('view', 'id' => $model->id));
					}
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

		if (isset($_POST['Tema'])) {
			$model->attributes = $_POST['Tema'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
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
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Tema');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Tema('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Tema']))
			$model->attributes = $_GET['Tema'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tema the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Tema::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tema $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tema-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
