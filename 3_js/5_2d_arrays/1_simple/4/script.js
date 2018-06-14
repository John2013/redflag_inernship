const app = getById('app');
const button = getById('button');

const getMatrixSum = (array) =>
	array.reduce(
		(sum, item) => sum + +item.reduce(
			(sum, item) => sum + +item
		)
	);

const getMatrixProduct = (array) =>
	array.reduce(
		(prod, item) => prod * item.reduce(
			(prod2, item2) => prod2 * item2,
			1
		),
		1
	);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 255);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>сумма: ${getMatrixSum(array)}, произведение: ${getMatrixProduct(array)}`
});



