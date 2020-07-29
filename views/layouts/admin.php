<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset3;

AppAsset3::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href= __DIR__ . "../web/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href= __DIR__ . "../web/css/font-awesome.min.css">

  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- DataTables -->

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="assets/css/skin-purple.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

</head>

<div class="wrap">

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Навигация</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="photos/index.html"><i class="fa fa-image"></i> <span>Все картинки</span></a></li>
        <li><a href="categories/index.html"><i class="fa fa-list"></i> <span>Категории</span></a></li>
        <li><a href="users/index.html"><i class="fa fa-group"></i> <span>Пользователи</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Админ-панель</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <h3>Здесь вы можете управлять всем сайтом</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, assumenda id aliquam voluptate autem voluptatibus blanditiis illo animi earum beatae.
            </p>
            <p>
              <h4>Lorem ipsum dolor.</h4>
              <p>
              ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quia assumenda debitis, laudantium accusamus quam, quae aperiam quasi dolorem eveniet recusandae optio vel repellendus animi. Nihil quidem vitae nam, beatae itaque consequatur delectus quas natus sint molestiae! Voluptate eaque, iste, vitae, quod nam ullam mollitia quaerat saepe suscipit minus ducimus.
              </p>
            </p>
            <p>
              Lorem ipsum <b>dolor</b> sit amet, consectetur adipisicing elit. Libero hic minima temporibus commodi quasi impedit iure illo quod possimus odio laboriosam, quas, <b>sit optio inventore</b> fugit id aliquam vero maxime.
            </p>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            По вопросам к главному администратору.
          </div>
          <!-- /.box-footer-->

          
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
     
    </section>
    <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->

