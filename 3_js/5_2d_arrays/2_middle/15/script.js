const app = getById('app');
const button = getById('button');


const getProductOfRow = (matrix, rowNumber) => matrix[rowNumber].reduce((product, value) => product * value, 1);


button.addEventListener('click', () => {
	const matrix = randFloatMatrix(7, 6, 0, 9, 1);

	const tableArray = getTable(matrix);

	const rowNumber = randInt(0, matrix.length - 1);

	app.innerHTML = `${tableArray}<br>Произведение строки ${rowNumber}: ${getProductOfRow(matrix, rowNumber)}`
});



