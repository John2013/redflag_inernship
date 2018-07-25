<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 17:23
 */
/**
 * @param string $text
 * @param string $type
 * @return string
 */
function alert($text, $type="warning"){
	ob_start();
	?>
	<div class="alert alert-<?= $type ?>" role="alert">
		<?= $text ?>
	</div>
	<?
	return ob_get_clean();
}