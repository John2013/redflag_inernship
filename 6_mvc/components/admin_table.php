<?

/**
 * @param HallRow[]|Movie[]|MovieHall[]|Place[]|Reservation[]|Session[]|Tariff[] $objects
 * @param string $filter_str
 * @return string
 */
function admin_table($objects, $filter_str = '')
{
	if(count($objects) < 1)
		return '';

	$class_name = $objects[0]->className();
	ob_start();
	?>
	<table class="table table-striped table-dark">
		<?= $filter_str ?>
		<tr>
			<? foreach ($objects[0] as $col_name => $_) {
				?>
				<th scope="col"><?= $col_name ?></th><?
			} ?>
			<th scope="col">действия</th>
		</tr>
		<? foreach ($objects as $object) {
			?>
			<tr>
				<? foreach ($object as $key => $_) {
					if (mb_substr($key, 0, 0) == '_')
						continue;

					elseif (in_array($key, ["created_at", "updated_at"]))
						$value = date('d.m.Y H:i', $object->$key);

					elseif(substr($key, -4) == "_url")
						$value = "<a href='{$object->$key}'>{$object->$key}</a><br><img src='{$object->$key}' width='100'>";

					elseif(in_array($key, ["text", "description"]))
						$value = mb_strlen($object->$key) > 50
							? mb_substr($object->$key, 0, 50) . "…"
							: $object->$key;

					elseif ($object->$key == null)
						$value = '&lt;не задано&gt;';

					else
						$value = $object->$key;
					?>
					<td><?= $value ?></td><?
				} ?>
				<td>

					<a href="/6_mvc/admin/view.php?model=<?= $class_name ?>&id=<?= $object->id ?>"
					   title="детально">👁</a>
					<a href="/6_mvc/admin/change.php?model=<?= $class_name ?>&id=<?= $object->id ?>"
					   title="изменить">🖉</a>
					<a href="/6_mvc/admin/delete.php?model=<?= $class_name ?>&id=<?= $object->id ?>"
					   title="удалить">🞩</a>
				</td>
			</tr>
			<?
		} ?>
	</table>

	<div><a href="/6_mvc/admin/add.php?add[class_name]=<?= $class_name ?>" class="btn btn-primary">Добавить</a></div>
	<?
	return ob_get_clean();
}