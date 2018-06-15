const app = getById('app');
const button = getById('button');


button.addEventListener('click', () => {
	const n = getNumById('n');
	const row = getNumById('row');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Сумма строки ${row}: ${array[row].reduce((s, v) => s + v)}`
});



