const app = document.getElementById('app');
const button = document.getElementById('button');

const getFibonacciItem = (n) => {
	if(n === 1) return 0;
	if(n === 2) return 1;

	let f_minus_2 = -1;
	let f_minus_1 = 0;
	let f = 0;
	for (let i = 3; i <= n; i += 1){
		f_minus_2 += 1;
		f_minus_1 += 1;
		f = f_minus_2 + f_minus_1
	}

	return f
};


button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;

	app.innerText = `${getFibonacciItem(n)}`
});