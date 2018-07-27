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
function change_form($model){
	ob_start();
	?>
	<form method="post">
		<input type="hidden" name="change[class_name]" value="<?= $model->className() ?>">
		<input type="hidden" name="change[id]" value="<?= $model->id ?>">
		<?
		foreach ($model as $key => $_){
			if(
				substr($key, 0, 1) == '_'
				|| in_array($key, ['created_at', 'updated_at', 'id'])
			)
				continue;
			?>
			<div class="form-group">
				<label for="change_<?= $key ?>"><?= $key ?></label>
				<?
				if(in_array($key, ['text', 'description']))
				{
					?>
					<textarea class="form-control" id="change_<?= $key ?>" name="change[<?= $key ?>]"
					          rows="7"><?= $model->$key ?></textarea>
					<?
				}
				elseif (in_array($key, ['time',])){
					?>
					<input type="hidden" name="change[<?= $key ?>]" id="change_<?= $key ?>" value="<?= $model->$key ?>" data-type="datetime">
					<?
				}
				elseif (substr($key, -3) == '_id') {
					$options = get_options($key);
					?>
					<select class="form-control" name="change[<?= $key ?>]" id="change_<?= $key ?>">
						<?
						foreach ($options as $option){
							?>
							<option value="<?= $option['id'] ?>"<? if($model->$key == $option['id']){?> selected<?} ?>>
								<?= $option['title'] ?>
							</option>
							<?
						}
						?>
					</select>
					<?
				} else {
					?>
					<input class="form-control" id="change_<?= $key ?>" name="change[<?= $key ?>]" value="<?= $model->$key ?>">
					<?
				}
				?>
			</div>
			<?
		}
		?>
		<input type="submit" value="изменить" class="btn btn-primary">
	</form>
	<?
	return ob_get_clean();
}