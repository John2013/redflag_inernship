const app = getById('app');
const button = getById('button');


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	const firstRowSum = array[0].reduce((s, v)=>s+v);
	const lastRowSum = array[array.length - 1].reduce((s, v)=>s+v);

	app.innerHTML = `${tableArray}<br>Сумма первой строки - ${firstRowSum}; сумма последней строки - ${lastRowSum}`
});



