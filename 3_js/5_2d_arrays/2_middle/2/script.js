const app = getById('app');
const button = getById('button');

const negativeDiagCount = (matrix, isMainDiag = true) =>
	matrixDiagReduce(
		matrix,
		(count, value) => count + +(value < 0),
		0,
		isMainDiag
	);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, -1, 2);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Отрицательных по диагоналям: ${negativeDiagCount(array, true)}; ` +
		`${negativeDiagCount(array, false)}`
});



