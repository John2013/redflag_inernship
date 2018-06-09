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



app.innerHTML = `${x}<sup>${n}</sup> = ${simple_pow(x, n)}`;