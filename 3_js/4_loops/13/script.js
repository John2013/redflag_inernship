const app = document.getElementById('app');
const n = +prompt('Введи n');

const get_quadratic_roots = (a, b, c) => {
	const D = b * b - 4 * a * c;

	let x1, x2;

	if (D >= 0){
		x1 = (D ** .5 / 2 * a).toFixed(3);
	}

	if (D > 0){
		x2 = (-(D ** .5) / 2 * a).toFixed(3);
	}
	return [x1, x2]
};

let results = [];
for(let a = 1; a <= n; a++){
	results.push(get_quadratic_roots(1, 2*a, -3))
}

let output = '';
for(let index in results){
	output += `x<sup>2</sup> + ${2 * (index + 1)}x - 3 = 0: x1=${results[index][0]}, x2=${results[index][1]}<br>`
}

app.innerHTML = output;