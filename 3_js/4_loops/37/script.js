const app = document.getElementById('app');
const button = document.getElementById('button');

const getFibonacciArray = (n) => {
	if (n === 1) return [0];
	if (n === 2) return [0, 1];

	let array = [0, 1];

	for (let i = 2; i < n; i += 1)
		array.push(array[i - 2] + array[i - 1])


	return array
};


button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;

	app.innerText = `${getFibonacciArray(n).join(', ')}`
});