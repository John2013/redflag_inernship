const app = getById('app');
const button = getById('button');

const sumOfCol = (matrix, col) =>
	rotateMatrix(matrix)[col].reduce((s, v) => s + v);


button.addEventListener('click', () => {
	const n = getNumById('n');
	const col = getNumById('col');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Сумма столбца ${col} = ${sumOfCol(array, col)}`
});



