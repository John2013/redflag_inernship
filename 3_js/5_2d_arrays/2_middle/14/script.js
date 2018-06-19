const app = getById('app');
const button = getById('button');

const sum = array => array.reduce((sum, value) => sum + value);

const changeLastOnSum = matrix => {
	let newMatrix = matrix.slice();
	for (let i = 1; i < newMatrix.length; i += 1){
		newMatrix[i].pop();
		newMatrix[i].push(sum(newMatrix[i - 1]))
	}
	return newMatrix
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



