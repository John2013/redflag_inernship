const app = getById('app');
const button = getById('button');

const getMaxIndexesOfRowsArray = (matrix) =>
	matrix.map((row, rowIndex, matrix) =>
		row.reduce((maxIndex, value, colIndex) => {
			const maxRow = maxIndex[0], maxCol = maxIndex[1];

			if (value > matrix[maxRow][maxCol])
				return [rowIndex, colIndex];

			return maxIndex;
		}, [0, 0]
		)
	);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	const maxItemsIndexes = getMaxIndexesOfRowsArray(array);

	app.innerHTML = `${tableArray}<br>${getItemsByCoordsStr(array, maxItemsIndexes)}`
});



