const app = document.getElementById('app');
const button = document.getElementById('button');

function get_factorial(n) {
	let factorial = 1;

	for (let i = 1; i <= n; i += 1){
		factorial *= i
	}

	return factorial
}

const eInX = (x, eps = 10000) => {
	let sum = 1;

	for (let i = 1; i <= eps; i += 1) {
		sum += x ** i / get_factorial(i)
	}

	return sum
};


button.addEventListener('click', () => {
	const x = +document.getElementById('x').value;

	app.innerHTML = `e<sup>x</sup> = ${eInX(x)}`
});