const app = getById('app');
const button = getById('button');

const getMatrixMaxAbsoluteItem = (array) =>
	array.reduce((maxItem, item) => Math.max(maxItem, Math.abs(item)), 0);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, -255, 255);

	const tableArray = getTable(array);

	const maxByColArray = getMaxByCol(array);

	app.innerHTML = `${tableArray}<br>максимум по колонкам: ${maxByColArray.join(', ')}`
});



