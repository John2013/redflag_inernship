const app = document.getElementById('app');


const button = document.getElementById('button');


button.addEventListener('click', () => {
	const array = document.getElementById('array')
		.value
		.trim()
		.split('\n')
		.map((item)=>+item);

	const min = Math.min(...array);

	app.innerText = `${min}`
});
