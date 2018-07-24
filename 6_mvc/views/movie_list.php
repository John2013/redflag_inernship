<div class="movie_list">
	<div class="row">
		<? /** @var Movie[] $movies */
		foreach ($movies as $movie){
			?>
			<div class="movie card col-sm-3">
				<img class="movie__img card-img-top" src="<?= $movie->poster_url ?>" alt="<?= $movie->name ?>">
				<div class="movie__body card-body">
					<h5 class="movie__title card-title"><?= $movie->name ?></h5>
					<p class="movie__description card-text"><?= $movie->description ?></p>
					<a href="/6_mvc/sessions.php?movie_id=<?= $movie->id ?>" class="btn btn-primary">Сеансы</a>
				</div>
			</div>
			<?
		} ?>
</div>
</div>