$(document).ready(()=>{
	$.getJSON('data.json', data => {
		console.log(data)
	})
});