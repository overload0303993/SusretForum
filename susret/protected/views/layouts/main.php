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
					array('label'=>'Odjava ('.Yii::app()->user->name.')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest),
					array('label' => 'Pretraživanje', 'url' => '#', 'items' => array(
							array('label' => 'Po temi', 'url' => array('/tema/admin')),
							array('label' => 'Po korisniku', 'url' => array('/korisnik/admin')),
							array('label' => 'Po postu', 'url' => array('/post/view')),
						),),
					array('label' => 'Informacije o meni', 'url' => array('/korisnik/view/' . Yii::app()->user->id)),
					array('label' => 'Privatne poruke', 'url' => array('/korisnik/view/' . Yii::app()->user->id)),
					array('label' => 'Informacije o forumu', 'url' => array('/korisnik/view/' . Yii::app()->user->id)),
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
