const app = document.getElementById('app');
const button = document.getElementById('button');

const getDividersProduct = (array, n) => array
	.filter((value)       => (9 < value && value < 100 && value % n === 0))
	.reduce((prod, value) => prod * value);


button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);

	app.innerText = `${getDividersProduct(nArray, n)}`
});