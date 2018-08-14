function href(url) {
	document.location.href = url;
}

function movieOnClick(e){
	const target = $(e.currentTarget);
	const movieId = target.data('id');
	const url = `/sessions/${movieId}`;
	href(url);
}

$(document).ready(function () {
	$('.movie').click(movieOnClick)
});