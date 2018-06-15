const app = getById('app');
const button = getById('button');

const matrixCountOfX = (array, x) =>
	matrixReduce(
		array,
		(count, value) => count + +(value === x),
		0
	);

button.addEventListener('click', () => {
	const n = getNumById('n'),
		x = getNumById('x');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	const count = matrixCountOfX(array, x);

	app.innerHTML = `${tableArray}<br>Количество x: ${count}`
});



