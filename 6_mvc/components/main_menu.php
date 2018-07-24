<?php
function main_menu($items=null){
	if(!isset($items)){
		$items = [
			[
				'id'=>0,
				'title'=>'Список фильмов',
				'url'=> '/6_mvc/'
			]
		];
	}
	ob_start();
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Кинотеатр</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu-nav"
		        aria-controls="main-menu-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-menu-nav">
			<ul class="navbar-nav">
				<? foreach ($items as $item){
					$active = ($item['id'] == ACTIVE_MENU_ITEM_ID)
					?>
					<li class="nav-item<? if($active){ ?> active<? } ?>">
						<a class="nav-link" href="#"><?= $item['title'] ?><? if($active){
							?> <span class="sr-only">(current)</span><?
						} ?></a>
					</li>
					<?
				} ?>
			</ul>
		</div>
	</nav>
	<?
	return ob_get_clean();
}
?>
