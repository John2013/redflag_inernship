const app = getById('app');
const button = getById('button');


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}`
});



