const app = document.getElementById('app');
const button = document.getElementById('button');

button.addEventListener('click', ()=>{
	const x = +document.getElementById('x').value;
	const a = document.getElementById('a').value.trim().split('\n').map((item)=>+item);

	const polynomial = a.reduce((polynomial, item, index)=>item * x ** index);
	app.innerText = `значение многочлена степени ${a.length} с коэффициентами ${a.join(', ')} от одной переменной в ` +
		`точке ${x} - ${polynomial}`
});