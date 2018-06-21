const app = getById('app');
const button = getById('button');

const sum = array => array.reduce((sum, value) => sum + value);

const changeLastOnSum = matrix => {
	for (let i = 1; i < matrix.length; i += 1){
		matrix[i].pop();
		matrix[i].push(sum(matrix[i - 1]))
	}
	return matrix
};


button.addEventListener('click', () => {
	const n = getNumById('n');
	const m = getNumById('m');

	const matrix = randIntMatrix(n, m, 0, 9);

	const tableMatrix = getTable(matrix);

	const matrix2 = changeLastOnSum(matrix);

	const tableMatrix2 = getTable(matrix2);

	app.innerHTML = `${tableMatrix}<br>${tableMatrix2}`
});



