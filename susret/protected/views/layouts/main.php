<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/my.css" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>

		<div class="container" id="page">

			<!--	<div id="header">
					<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
				</div> header -->

			<img src="/susret/images/banner.png" alt="image" width="100%"></img>

			<!--			<div id="mainmenu">-->
			<?php
			$this->widget('ext.CDropDownMenu.XDropDownMenu', array(
				'items' => array(
					array('label' => 'Početna', 'url' => array('../susret')),
					array('label'=>'Odjava ('.Yii::app()->user->name.')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest)
//					array('label' => 'Data Widgets', 'url' => '#', 'items' => array(
//							array('label' => 'List view', 'url' => array('/person/index')),
//							array('label' => 'Grid view', 'url' => array('/person/admin')),
//							array('label' => 'Detail view', 'url' => array('/person/view', 'id' => 3)),
//							array('label' => 'Tree view', 'url' => array('/site/widget', 'view' => 'treeview')),
//							array('label' => 'Multilevel menu', 'url' => array('/site/widget', 'view' => 'menu')),
//							array('label' => 'Breadcrumbs', 'url' => array('/site/widget', 'view' => 'breadcrumbs')),
//						)),
//					array('label' => 'Form Widgets', 'url' => '#', 'items' => array(
//							array('label' => 'Autocomplete', 'url' => array('/site/widget', 'view' => 'autocomplete')),
//							array('label' => 'Masked textfield', 'url' => array('/site/widget', 'view' => 'maskedtextfield')),
//							array('label' => 'Multiple file upload', 'url' => array('/site/widget', 'view' => 'multifileupload')),
//							array('label' => 'Datepicker', 'url' => array('/site/widget', 'view' => 'datepicker')),
//							array('label' => 'Star rating', 'url' => array('/site/widget', 'view' => 'starrating')),
//						)),
				),
			));
			?>
			<!--			</div>-->
			</br></br>
						<?php //if(isset($this->breadcrumbs)):?>
						<?php
						//$this->widget('zii.widgets.CBreadcrumbs', array(
						//'links'=>$this->breadcrumbs,
						//)); 
						?><!-- breadcrumbs -->
						<?php //endif  ?>

						<?php echo $content; ?>

						<div class="clear"></div>

						<div id="footer">
							<?php echo Yii::powered(); ?>
						</div><!-- footer -->

						</div><!-- page -->

						</body>
						</html>
