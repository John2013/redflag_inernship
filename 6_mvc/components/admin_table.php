<?

/**
 * @param HallRow[]|Movie[]|MovieHall[]|Place[]|Reservation[]|Session[]|Tariff[] $objects
 * @param string $filter_str
 * @return string
 */
function admin_table($objects, $filter_str = '')
{
	ob_start();
	if (!empty($objects)){
		$class_name = $objects[0]->className();
		?>
		<table class="table table-striped table-dark">
			<?= $filter_str ?>
			<tr>
				<? foreach ($objects[0] as $key => $_) {
					if (substr($key, 0, 1) == '_')
						continue;
					?>
					<th scope="col"><?= $key ?></th><?
				} ?>
				<th scope="col">действия</th>
			</tr>
			<? foreach ($objects as $object) {
				?>
				<tr>
					<? foreach ($object as $key => $_) {

						if (substr($key, 0, 1) == '_')
							continue;

						if (in_array($key, ["created_at", "updated_at", "time"]))
							$value = date('d.m.Y H:i', $object->$key);

						elseif(substr($key, -4) == "_url")
							$value = "<a href='{$object->$key}'>{$object->$key}</a><br><img src='{$object->$key}' width='100'>";

						elseif(in_array($key, ["text", "description"]))
							$value = mb_strlen($object->$key) > 50
								? mb_substr($object->$key, 0, 50) . "…"
								: $object->$key;

						elseif(substr($key, -3) == "_id"){
							$value = get_option($key, $object->$key);
						}

						else
							$value = $object->$key; 

						if ($value == null)
							$value = '&lt;не задано&gt;';
						?>
						<td><?= $value ?></td><?
					} ?>
					<td>
						<a href="/6_mvc/admin/detail.php?detail[class_name]=<?= $class_name ?>&detail[id]=<?= $object->id ?>"
						   title="детально">👁</a>
						<a href="/6_mvc/admin/change.php?change[class_name]=<?= $class_name ?>&change[id]=<?= $object->id ?>"
						   title="изменить">🖉</a>
						<a href="/6_mvc/admin/delete.php?del[class_name]=<?= $class_name ?>&del[id]=<?= $object->id ?>"
						   title="удалить">🞩</a>
					</td>
				</tr>
				<?
			} ?>
		</table>
		<?
	} else {
		$class_name = CLASS_NAME;
		echo alert('Таблица пуста');
	}
	?>
	<div><a href="/6_mvc/admin/add.php?add[class_name]=<?= $class_name ?>" class="btn btn-primary">Добавить</a></div>
	<?
	return ob_get_clean();
}