const app = document.getElementById('app');


const button = document.getElementById('button');


button.addEventListener('click', () => {
	const array = document.getElementById('array').value.trim().split('\n').map((item)=>+item);

	app.innerText = '' + array.reduce((product, array_item) => product * array_item);
});
