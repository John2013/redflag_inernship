const app = document.getElementById('app');
const button = document.getElementById('button');

const getProductOfEven = (array) => array.reduce((prod, item, index) => {
		if ((index + 1) % 2 === 0)
			return prod * item;
		return prod
	},
	1
);


button.addEventListener('click', () => {
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);

	app.innerText = `${getProductOfEven(nArray)}`
});