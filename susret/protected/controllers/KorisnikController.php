<?php

class KorisnikController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';
	public $greskaUser = "";
	public $greskaFatal = "";
	public $greskaRola = "";
	public $passGreska = "";

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			//'accessControl', // perform access control for CRUD operations
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
				'actions' => array('index', 'view', 'admin'),
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
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Korisnik();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Korisnik'])) {
			$model->attributes = $_POST['Korisnik'];
			$user = Korisnik::model()->find('userName=:userName', array(':userName' => $model->userName));
			if (!empty($user)) {
				$this->greskaUser = "Korisnik s istim korisničkim imenom postoji u bazi.";
				$model->password = $model->drugaLozinka = '';
				header("Location : " . Yii::app()->request->requestUri);
			} elseif (empty($model->rola)) {
				$this->greskaRola = "Rola je obavezna!";
				$model->password = $model->drugaLozinka = '';
				header("Location : " . Yii::app()->request->requestUri);
			} elseif (empty($model->drugaLozinka) || empty($model->password)) {
				$this->passGreska = "Obje lozinke su obavezne.";
				$model->password = $model->drugaLozinka = '';
				header("Location : " . Yii::app()->request->requestUri);
			} else {
				$model->drugaLozinka = md5(md5($model->drugaLozinka));
				$model->password = md5(md5($model->password));
				$model->brojPostova = 0;
				$model->rang = 0;
				$model->datumReg = new CDbExpression("NOW()");
				$uploadedFile = CUploadedFile::getInstance($model, 'avatar');
				if (empty($uploadedFile)) {
					$model->avatar = '';
				} else {
					//php way za ekstrakciju ekstenzije
					$path_info = pathinfo($uploadedFile);
					$ext = $path_info['extension'];
					$date = new DateTime();
					$filename = strval($date->getTimestamp()) . $model->userName;
					$model->avatar = $filename . '.' . $ext;
				}
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
				try {
					if ($model->save()) {
						if (!empty($uploadedFile)) {
							$uploadedFile->saveAs("D:/xampp/htdocs/susret/userImages/" . $filename . '.' . $ext);
						}
						$this->redirect(array('/'));
					}
				} catch (CDbException $e) {
					$model->password = $model->drugaLozinka = '';
					$this->greskaFatal = "Ozbiljna pogreška. Molimo javite se autorima jer su napravili glupost. Hvala!";
					header("Location : " . Yii::app()->request->requestUri);
				}
			}
		}
		$model->password = $model->drugaLozinka = '';
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
		$oldUser = $model->userName;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if (isset($_POST['Korisnik'])) {
			$_POST['Korisnik']['avatar'] = $model->avatar;
			$model->attributes = $_POST['Korisnik'];
			$user = Korisnik::model()->find('userName=:userName', array(':userName' => $model->userName));
			if (!empty($user) && $model->userName != $oldUser) {
				$this->greskaUser = "Korisnik s istim korisničkim imenom postoji u bazi.";
				header("Location : " . Yii::app()->request->requestUri);
			} else {
				$model->brojPostova = intval($model->brojPostova);
				$model->rang = floatval($model->rang);
				$uploadedFile = CUploadedFile::getInstance($model, 'avatar');
				$model->drugaLozinka = "";
				try {
					if (!empty($uploadedFile)) {
						//spremi novu sliku iz "uploadedFile" pod starim imenom da ne radim ponovo svu logiku ponovo
						if (!$model->avatar) {
							$path_info = pathinfo($uploadedFile);
							$ext = $path_info['extension'];
							$date = new DateTime();
							$filename = strval($date->getTimestamp()) . $model->userName;
							$file = $filename . '.' . $ext;
							$model->avatar = $file;
							$uploadedFile->saveAs("D:/xampp/htdocs/susret/userImages/" . $file);
						}
						$uploadedFile->saveAs("D:/xampp/htdocs/susret/userImages/" . $model->avatar);
					}
					if ($model->save()) {
						$this->redirect(array('/'));
					}
				} catch (CDbException $e) {
					header("Location : /susret/korisnik/create");
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
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Korisnik');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Korisnik('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Korisnik']))
			$model->attributes = $_GET['Korisnik'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Korisnik the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Korisnik::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Korisnik $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'korisnik-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
