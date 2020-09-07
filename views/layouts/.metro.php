<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MetroAsset;


/* @var $this \yii\web\View */
/* @var $content string */

MetroAsset::register($this);
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo Html::encode($this->title); ?></title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="robots" content="all">
    <?php $this->head(); ?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
</head>

<body>
<?php $this->beginBody() ?>

<div class="metro-layout horizontal">
    <div class="header">
        <h1 style="font-family: 'DejaVu Sans Light' !important;"><a href="" style="text-decoration: none;color: #fff">HelpDesk</a></h1>
        <div class="controls">
            <span class="down" title="Scroll down"></span>
            <span class="up" title="Scroll up"></span>
            <span class="next" title="Scroll left"></span>
            <span class="prev" title="Scroll right"></span>
            <span class="toggle-view" title="Toggle layout"></span>
        </div>
    </div>
    <div class="content clearfix">
        <div class="items">
            <a class="box" href="#">
                <span>Pengaduan</span>
                <img class="icon" src="<?php echo $this->theme->baseUrl ?>/images/mail.png" alt=""/>
            </a>
            <a class="box" href="#" style="background: #00a9ec;">
                <span>Cek Pengaduan</span>
                <img class="icon" src="<?php echo $this->theme->baseUrl ?>/images/tasks.png" alt=""/>
            </a>
            <a class="box" href="#" style="background: #6c6c6c;">
                <span>Lihat Pengaduan</span>
                <img src="<?php echo $this->theme->baseUrl ?>/images/view-list.png" class="icon">
            </a>
        </div>
        <div id="render-view" style="padding: 2.5em">

        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php $this->endBody(); ?>
</body>
</html>

<?php $this->endPage(); ?>
