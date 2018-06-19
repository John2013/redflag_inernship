const app = getById('app');
const button = getById('button');


const getMinOfMatrix = matrix => matrixReduce(matrix, (min, value) => (value < min) ? value : min);

const getSumOfPositivesOfMatrix = matrix => matrixReduce(matrix, (sum, value) => (value > 0) ? sum + value : sum);

const getProductOfMinAndSum = matrix => getMinOfMatrix(matrix) * getSumOfPositivesOfMatrix(matrix);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randFloatMatrix(n, n, -9, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>произведение минимального элемента матрицы вещественных чисел на сумму её ` +
		`положительных элементов :${getProductOfMinAndSum(array)}`
});



