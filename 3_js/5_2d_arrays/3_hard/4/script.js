const app = getById('app');
const button = getById('button');


const matrixOrderByFirstRowDesc = array => array.sort((a, b) => {
	if (a[0] < b[0]) return 1;
	if (b[0] < a[0]) return -1;
	return 0
});


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const matrixTable = getTable(matrix);

	const sortedMatrix = rotateMatrix(matrixOrderByFirstRowDesc(rotateMatrix(matrix)));

	const sortedMatrixTable = getTable(sortedMatrix);

	app.innerHTML = `${matrixTable}<br>${sortedMatrixTable}`
});