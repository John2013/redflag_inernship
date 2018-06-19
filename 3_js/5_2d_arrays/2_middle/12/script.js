const app = getById('app');
const button = getById('button');

const sum = array => array.reduce((sum, item) => sum + item);

const middleArithmetic = array => sum(array) / array.length;

const getMiddlesArray = matrix => matrix.map(array => middleArithmetic(array));

button.addEventListener('click', () => {
	const n = getNumById('n');
	const m = getNumById('m');

	const array = randIntMatrix(n, m, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>${getList(getMiddlesArray(array))}`
});



