const app = getById('app');
const button = getById('button');


const getBottomFromSlaveMatrixDiag = matrix => {
	for (let i in matrix){
		for (let j in matrix[i]) {
			if (i <= matrix.length - 1 - j){
				matrix[i][j] = '';
			}
		}
	}

	return matrix
};

function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

const matrixMin = matrix =>
	matrixReduce(
		matrix,
		(min, value) => (value < min && isNumber(value))? value: min,
		matrix[1][matrix.length - 1]
	);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const matrixTable = getTable(matrix);

	const bottomFromDiag = getBottomFromSlaveMatrixDiag(matrix);

	const bottomFromDiagTable = getTable(matrix);

	const min = matrixMin(bottomFromDiag);

	app.innerHTML = `${matrixTable}<br>${bottomFromDiagTable}<br>Минимальный ниже диагонали: ${min}`
});