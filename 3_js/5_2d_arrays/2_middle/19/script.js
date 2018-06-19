const app = getById('app');
const button = getById('button');

const matrixSum = matrix => matrixReduce(matrix, (sum, value) => sum + value);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(matrix);

	app.innerHTML = `${tableArray}<br>${matrixSum(matrix)}`
});



