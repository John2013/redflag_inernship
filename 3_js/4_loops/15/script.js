const app = document.getElementById('app');
const button = document.getElementById('button');

// function* generateRangeGenerator(start, stop, step = 1){
// 	for (let i = start; i < stop; i += step){
// 		yield i
// 	}
// }


button.addEventListener('click', ()=>{
	const x = +document.getElementById('x').value;

	let factorial = 1;

	// let rangeGenerator = generateRangeGenerator(1, x + 1);
	for (let n = 1; n <= x; n += 1){
		factorial *= n
	}
	app.innerText = `${x}! = ${factorial}`
});