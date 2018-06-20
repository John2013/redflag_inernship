const app = getById('app');
const button = getById('button');


const revertDiagonals = matrix => {
	let newMatrix = matrix.slice();
	let j;
	for (let i in matrix) {
		j = matrix.length - 1 - i;
		newMatrix[i][i] = matrix[j][j];
		newMatrix[i][j] = matrix[j][i];
	}
	return newMatrix
};


button.addEventListener('click', () => {

	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const matrixTable = getTable(matrix);

	const revertDiagsMatrix = revertDiagonals(matrix);

	const revertDiagsMatrixTable = getTable(revertDiagsMatrix);

	app.innerHTML = `${matrixTable}<br>${revertDiagsMatrixTable}`
});