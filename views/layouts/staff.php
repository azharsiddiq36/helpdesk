<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use \yiister\gentelella\widgets\Menu;

$bundle = \app\assets\AdminAsset::register($this);

?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            .btn-link {
                text-decoration: none !important;
            }
            footer {
                padding: 35px 25px !important;
            }
        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>">
    <?php $this->beginBody(); ?>
    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title">
                            <span class="fa fa-desktop"></span>&nbsp;
                            <span><?= Yii::$app->params['sistemName'] ?></span>
                        </a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?= $this->theme->baseUrl ?>/images/ic-home.png" alt="..."
                                 class="img-circle profile_img" style="background: #ccc">
                        </div>
                        <div class="profile_info">
                            <span>Welcome Staff,</span>
                            <h2>
                                <?= isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : '' ?>
                            </h2>
                        </div>
                    </div>
                    <div class="clearfix" style="padding: 20px"></div>
                    <!-- /menu prile quick info -->
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <?=
                            Menu::widget(
                                [
                                    "items" => [
                                        ["label" => "Home", "url" => ["site/index"], "icon" => "home"],
                                        ["label" => "Profile", "url" => ["user/view", "id" => Yii::$app->user->identity->getId()], "icon" => "user"],
                                        ["label" => "Pengaduan", "url" => ["pengaduan/index"], "icon" => "envelope"],
                                    ]
                                ]
                            )
                            ?>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <span class="fa fa-user"></span>&nbsp;
                                    <?= isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : '' ?>
                                    &nbsp;
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <?=
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Log Out <span class="fa fa-sign-out"></span>',
                                        ['class' => 'btn btn-link logout']
                                    )
                                    . Html::endForm()
                                    . '</li>'
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="container">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">

                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- /footer content -->
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>