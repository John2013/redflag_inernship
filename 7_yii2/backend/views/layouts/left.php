<aside class="main-sidebar">

	<section class="sidebar">

		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= Yii::$app->user->identity->getThumbFileUrl('avatar', 'thumb90') ?>" class="img-circle" alt="User Image"/>
			</div>
			<div class="pull-left info">
				<p><?= Yii::$app->user->identity->getName() ?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Поиск..."/>
				<span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
			</div>
		</form>
		<!-- /.search form -->

		<?= dmstr\widgets\Menu::widget(
			[
				'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
				'items' => [
					['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
					['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
					['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
					['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
					/*[
						'label' => 'Some tools',
						'icon' => 'share',
						'url' => '#',
						'items' => [
							['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
							['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
							[
								'label' => 'Level One',
								'icon' => 'circle-o',
								'url' => '#',
								'items' => [
									['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
									[
										'label' => 'Level Two',
										'icon' => 'circle-o',
										'url' => '#',
										'items' => [
											['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
											['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
										],
									],
								],
							],
						],
					],*/
					[
						'label' => 'Фильмы',
						'icon' => 'film',
						'url' => ['movie/index'],
					],
					[
						'label' => 'Кинозалы',
						'icon' => 'video-camera',
						'url' => ['hall/index'],
					],
					[
						'label' => 'Ряды',
						'icon' => 'align-justify',
						'url' => ['row/index'],
					],
					[
						'label' => 'Места',
						'icon' => 'braille',
						'url' => ['place/index'],
					],
					[
						'label' => 'Тарифы',
						'icon' => 'rouble',
						'url' => ['tariff/index'],
					],
					[
						'label' => 'Бронь',
						'icon' => 'shopping-cart',
						'url' => ['reservation/index'],
					],
					[
						'label' => 'Статусы бронирования',
						'icon' => 'bars',
						'url' => ['reservation-status/index'],
					],
					[
						'label' => 'Сеансы',
						'icon' => 'calendar',
						'url' => ['session/index'],
					],
				],
			]
		) ?>

	</section>

</aside>
