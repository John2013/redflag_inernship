<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 12:10
 *
 * @var MovieHall[] $halls
 */
?>
<table class="table table-striped table-dark">
	<tr>
		<? foreach ($halls[0] as $key => $_) {
			if (substr($key, 0, 1) == '_')
				continue;
			?>
			<th scope="col"><?= $key ?></th><?
		} ?>
	</tr>
	<? foreach ($halls as $hall) {
		?>
		<tr>
			<? foreach ($hall as $key => $_) {

				if (substr($key, 0, 1) == '_')
					continue;

				if (in_array($key, ["created_at", "updated_at", "time"]))
					$value = date('d.m.Y H:i', $hall->$key);

				elseif(substr($key, -4) == "_url")
					$value = "<a href='{$hall->$key}'>{$hall->$key}</a><br><img src='{$hall->$key}' width='100'>";

				elseif(in_array($key, ["text", "description"]))
					$value = mb_strlen($hall->$key) > 50
						? mb_substr($hall->$key, 0, 50) . "…"
						: $hall->$key;

				elseif(substr($key, -3) == "_id"){
					$value = get_option($key, $hall->$key);
				}

				elseif($key == "number"){
					$value = "<a href='/6_mvc/admin/places.php?hall_id={$hall->id}'>{$hall->$key}</a>";
				}

				else
					$value = $hall->$key;

				if ($value == null)
					$value = '&lt;не задано&gt;';
				?>
				<td><?= $value ?></td><?
			} ?>
		</tr>
		<?
	} ?>
</table>
