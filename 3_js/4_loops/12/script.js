const app = document.getElementById('app');
const x = +prompt('Введи x');
const n = +prompt('Введи n');

// app.innerHTML = `x<sup>2</sup> = ${x ** n}`;
// это было бы слишком просто, да?

const simple_pow = (x, n=2) => {
	let result = x;

	if(n === 0) return 1;
	if(n === 1) return x;

	for (let i = 1; i < n; i++){
		result *= x;
	}
	return result
};

const fast_pow = (x, n=2) => {
	if(n === 0) return 1;
	if(n === 1) return x;

	const n_bin = n.toString(2).split('').map((item)=>+item);
	let result = simple_pow(x, n_bin[0]);
	result *= result;

	for (let k = 1; k <n_bin.length - 1; k++){
		result *= simple_pow(x, n_bin[k]);
		result *= result
	}

	result *= simple_pow(x, n_bin.pop());
	return result

};

app.innerHTML = `${x}<sup>${n}</sup> = ${fast_pow(x, n)}`;