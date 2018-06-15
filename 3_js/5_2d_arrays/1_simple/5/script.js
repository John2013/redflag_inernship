const app = getById('app');
const button = getById('button');

const getMatrixPositivesItemsCountOnDiagonal = (matrix) => {
	return matrixDiagReduce(matrix, (count, value) => count + +(value > 0), 0)
};

button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, -255, 255);

	const tableArray = getTable(matrix);

	const diagPositivesCount = getMatrixPositivesItemsCountOnDiagonal(matrix);

	app.innerHTML = `${tableArray}<br>Положительных на диагонали: ${diagPositivesCount}`
});



