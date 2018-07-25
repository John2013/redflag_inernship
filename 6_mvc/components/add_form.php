<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 17:23
 */
/**
 * @param HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model
 * @return string
 */
function add_form($model){
	ob_start();
	?>
	<form method="post">
		<input type="hidden" name="add[class_name]" value="<?= $model->className() ?>">
		<?
		foreach ($model as $key => $_){
			if(
				mb_substr($key, 0, 0) == '_'
				|| in_array($key, ['created_at', 'updated_at', 'id'])
			)
				continue;
			?>
			<div class="form-group">
				<label for="add_<?= $key ?>"><?= $key ?></label>
				<?
				if(in_array($key, ['text', 'description']))
				{
					?>
					<textarea class="form-control" id="add_<?= $key ?>" name="add[<?= $key ?>]" rows="7"></textarea>
					<?
				} else {
					?>
					<input class="form-control" id="add_<?= $key ?>" name="add[<?= $key ?>]">
					<?
				}
				?>
			</div>
			<?
		}
		?>
		<input type="submit" value="Добавить" class="btn btn-primary">
	</form>
	<?
	return ob_get_clean();
}