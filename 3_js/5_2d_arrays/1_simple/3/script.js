const app = getById('app');
const button = getById('button');

const maxByAbs = (array) => array.reduce((max, item) => Math.max(max, Math.abs(item)));

const getMatrixMaxAbsoluteItem = (array) =>
	array.reduce((maxItem, itemArray) => Math.max(maxItem, maxByAbs(itemArray)), 0);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, -255, 255);

	const tableArray = getTable(array);

	const maxAbsItem = getMatrixMaxAbsoluteItem(array);

	app.innerHTML = `${tableArray}<br>Максимальный по модулю элемент: ${maxAbsItem}`
});



