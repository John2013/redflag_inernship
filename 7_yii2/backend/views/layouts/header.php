<?php
use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $content string
 * @var \common\models\User $user
 */
/*  */

$user = Yii::$app->user->identity
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $user->getThumbFileUrl('avatar', 'thumb90') ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= $user->getName() ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $user->getThumbFileUrl('avatar', 'thumb90') ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= $user->getName() ?>
                                <small>C <?= date('d.m.Y H:i:s', $user->created_at) ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
	                            <?= Html::a(
		                            'Профиль',
		                            ['/profile'],
		                            ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
	                            ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выйти',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
