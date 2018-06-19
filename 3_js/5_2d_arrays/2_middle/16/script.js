const app = getById('app');
const button = getById('button');


const getCharsCountInMatrix = matrix => {
	let charsArray = [].concat(...matrix);

	return countBy(charsArray)
};

button.addEventListener('click', () => {
	const n = getNumById('n');
	const m = getNumById('m');

	const matrix = randCharMatrix(n, m);

	const tableArray = getTable(matrix);

	app.innerHTML = `${tableArray}<br>${JSON.stringify(getCharsCountInMatrix(matrix))}`
});



