const app = getById('app');
const button = getById('button');

const getRowsSumsArray = (matrix) => matrix.map((row) => row.reduce((s, v) => s + v))

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Суммы строк: ${getRowsSumsArray(array).join('; ')}`
});



