const app = document.getElementById('app');
const button = document.getElementById('button');

button.addEventListener('click', () => {
	const x = +document.getElementById('x').value;
	const n = +document.getElementById('n').value;
	app.innerText = `${x.toString(n)}`
});