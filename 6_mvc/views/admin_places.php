<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 12:10
 *
 * @var Place[][][] $halls
 */

foreach ($halls as $h_number => $rows){
	?>
	<h2>Кинозал <?= $h_number ?></h2>

	<table>
		<tr>
			<th>ряд</th>
			<th>места</th>
			<th>управление</th>
		</tr>
		<?
		foreach ($rows as $r_number => $row){
			?>
			<tr>
				<th><?= $r_number ?></th>
				<td><?
					foreach ($row as $place){
						?>
						<span class="place" title="<?= $place ?>" style="margin-left: <?= $place->offset ?>rem">■</span>
						<?
					}
					?></td>
				<td>
					<div class="btn-group places-buttons" role="group" aria-label="place-add">
						<button class="btn btn-danger btn-sm">-</button><button class="btn btn-success btn-sm">+</button>
					</div>
				</td>
			</tr>
			<?
		}
		?>
		<tr>
			<td colspan="3">
				<div class="btn-group-vertical places-buttons" role="group" aria-label="row-add">
					<button class="btn btn-danger btn-sm">-</button><button class="btn btn-success btn-sm">+</button>
				</div>
			</td>
		</tr>
	</table>
	<?
}
?>