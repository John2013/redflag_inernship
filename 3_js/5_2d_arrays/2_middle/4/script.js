const app = getById('app');
const button = getById('button');

const getColsSumArray = (array) =>
	matrixColsMap(array, (col) =>
		col.reduce(
			(sum, v) => sum + v
		)
	);



button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	const sumArray = getColsSumArray(array);

	app.innerHTML = `${tableArray}<br>Суммы столбцов: ${sumArray.join('; ')}`
});



