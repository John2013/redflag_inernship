const app = getById('app');
const button = getById('button');

const multiplyNon0MatrixDiagItems = matrix =>
	matrixDiagReduce(matrix, (product, value) => product * (value || 1), null, true, true);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const matrixTable = getTable(matrix);

	const diagProduct = multiplyNon0MatrixDiagItems(matrix);

	app.innerHTML = `${matrixTable}<br>Произведение диагональных элементов: ${diagProduct}`
});