const app = getById('app');
const button = getById('button');

const maxDiagItem = (matrix, isMainDiag = true) =>
	matrixDiagReduce(
		matrix,
		(maxItemAndHisIndexes, value, indexes) => {
			const max = maxItemAndHisIndexes[0];
			if(value > max){
				return [value, ...indexes]
			}
			return maxItemAndHisIndexes
		},
		[0, 0, 0],
		isMainDiag
		);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 100, 999);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>Максимальные по диагоналям: ${maxDiagItem(array, true).join(', ')}; ` +
		`${maxDiagItem(array, false).join(', ')}`
});



