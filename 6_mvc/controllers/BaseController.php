<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 23.07.2018
 * Time: 13:01
 */

class BaseController
{
	public $layout = 'main';

	protected function render_layout(string $title, string $content, array $vars = []){
		extract($vars);

		ob_start();
		require __DIR__ . "/../layouts/$this->layout.php";
		return ob_get_clean();
	}

	protected function render($name, string $title, $vars = []){
		extract($vars);
		ob_start();
		require __DIR__ . "/../views/$name.php";
		$content = ob_get_clean();
//		die();
		return $this->render_layout($title, $content, $vars);
	}
}