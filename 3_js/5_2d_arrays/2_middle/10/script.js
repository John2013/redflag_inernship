const app = getById('app');
const button = getById('button');

const getIndexOfMinOfArray = array => array.reduce(
	(minIndex, value, index, array) => (value < array[minIndex]) ? index : minIndex,
	0
);


const getIndexesOfMinOfRows = matrix =>
	matrix.map(array => getIndexOfMinOfArray(array));


const getIndexesOfMinOfCols = matrix =>
	matrixColsMap(
		matrix,
		col => getIndexOfMinOfArray(col)
	);


const getIndexesOfMinOfRowsAndCols = matrix => {
	const indexesOfRows = getIndexesOfMinOfRows(matrix);
	const indexesOfCols = getIndexesOfMinOfCols(matrix);

	let indexesOfMinOfRowsAndCols = [];

	indexesOfRows.forEach((minIndexOfRow, rowNumber) => {
		if (indexesOfCols[minIndexOfRow] === rowNumber) {
			indexesOfMinOfRowsAndCols.push([indexesOfCols[minIndexOfRow], minIndexOfRow])
		}
	});

	return indexesOfMinOfRowsAndCols
};


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Минимальные в строке и в столбце: ${getItemsByCoordsStr(array, getIndexesOfMinOfRowsAndCols(array))}`
});



