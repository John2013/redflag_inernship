const app = document.getElementById('app');
const button = document.getElementById('button');

function get_factorial(n) {
	let factorial = 1;

	for (let i = 1; i <= n; i += 1){
		factorial *= i
	}

	return factorial
}


button.addEventListener('click', ()=>{
	const x = +document.getElementById('x').value;

	app.innerText = `${x}! = ${get_factorial(x)}`
});