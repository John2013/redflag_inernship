<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 26.07.2018
 * Time: 11:30
 *
 * @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model
 */
?>
	<div class="card">
		<h5 class="card-header"><?= $model->className() ?></h5>
		<div class="card-body">
			<?
			foreach ($model as $key => $_){
				switch ($key){
					case 'created_at':
					case 'updated_at':
						$value = date('d.m.Y H:i', $model->$key);
						break;
					default:
						if(substr($key, -4) == '_url')
							$value = "<a href='{$model->$key}'>{$model->$key}</a><br><img src='{$model->$key}' alt=''>";
						else
							$value = $model->$key;
				}
				?>
				<h5 class="card-title"><?= $key ?></h5>
				<p class="card-text"><?= $value ?></p>
				<?
			}
			?>
			<a href="/6_mvc/admin/change.php?change[class_name]=<?= $model->className() ?>&change[id]=<?= $model->id ?>"
			   class="btn btn-primary">изменить</a>
			<a href="/6_mvc/admin/change.php?delete[class_name]=<?= $model->className() ?>&delete[id]=<?= $model->id ?>"
			   class="btn btn-danger">удалить</a>
		</div>
	</div>
