function href(url) {
	document.location.href = url;
}

function movieOnClick(e){
	const target = $(e.currentTarget);
	const movieId = target.data('id');
	const url = `/movie/${movieId}`;
	href(url);
}

$(document).ready(function () {
	$('.movies-item').click(movieOnClick);

	const session_element = $('#session');
	if(session_element.is('div.session')){
		const session_id = +session_element.data('id');
		console.log(session_id)


	}
});