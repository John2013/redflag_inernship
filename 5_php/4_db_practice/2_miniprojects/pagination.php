<?
function get_pagination($active_page = 0, $page_size=3, $items_count = 1){
	$pages_count = ceil($items_count / $page_size);
	ob_start();
	?>
	<nav>
		<ul class="pagination">
			<? $disabled = ($active_page == 0) ? " class=\"disabled\"" : ""; ?>
			<li<?= $disabled ?>>
				<a href="?page=<?= $active_page - 1 ?>" aria-label="Previous">
					<span aria-hidden="true">«</span>
				</a>
			</li>
			<?
			for ($page = 0; $page < $pages_count; $page += 1){
				$active = ($page == $active_page)? " class=\"active\"" : "";
				?>
				<li<?= $active ?>><a href="?page=<?= $page ?>"><?= $page + 1 ?></a></li>
				<?
			}
			?>
			<? $disabled = ($active_page == $pages_count - 1) ? " class=\"disabled\"" : ""; ?>
			<li<?= $disabled ?>>
				<a href="?page=<?= $active_page + 1 ?>" aria-label="Next">
					<span aria-hidden="true">»</span>
				</a>
			</li>
		</ul>
	</nav>
	<?
	return ob_get_clean();
}
?>