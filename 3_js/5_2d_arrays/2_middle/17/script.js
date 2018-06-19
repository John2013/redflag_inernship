const app = getById('app');
const button = getById('button');

const getMinsOfCols = matrix =>
	matrixColsMap(matrix, col => Math.min(...col));


button.addEventListener('click', () => {
	const rowsCount = getNumById('n');
	const colsCount = getNumById('m');

	const matrix = randIntMatrix(rowsCount, colsCount, 0, 9);

	const tableArray = getTable(matrix);

	const mins = getMinsOfCols(matrix);

	app.innerHTML = `${tableArray}<br>${mins.join('; ')} → ${Math.max(...mins)}`
});



