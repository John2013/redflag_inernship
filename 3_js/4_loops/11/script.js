const app = document.getElementById('app');
const x = +prompt('Введи x');
const n = +prompt('Введи n');

// app.innerHTML = `x<sup>2</sup> = ${x ** n}`;
// это было бы слишком просто, да?

let result = x;

for (let i = 1; i < n; i++){
	result *= x;
}

app.innerHTML = `x<sup>2</sup> = ${result}`;