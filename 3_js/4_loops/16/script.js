const app = document.getElementById('app');
const button = document.getElementById('button');


function get_factorial(n) {
	let factorial = 1;

	for (let i = 1; i <= n; i += 1){
		factorial *= i
	}

	return factorial
}

function get_combinations_count(n, k){
	return (get_factorial(n)/(get_factorial(k) * get_factorial(n - k)))
}

button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;
	const k = +document.getElementById('k').value;

	app.innerHTML = `Сочетаний из ${n} по ${k}: ${get_combinations_count(n, k)}`
});