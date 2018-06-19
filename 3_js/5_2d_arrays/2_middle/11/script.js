const app = getById('app');
const button = getById('button');

const isEven = number => (number % 2 === 0);


const compareEven = (a, b) => {
	if (!isEven(a) && isEven(b)) return -1;
	if (isEven(a) && !isEven(b)) return 1;
	return 0;
};


const getSortedEvenly = array => array.sort(compareEven);


const getMatrixSortedEvenly = matrix => matrix.map(array => getSortedEvenly(array));


const getEvenCount = array => array.reduce((cnt, value) => cnt + +(isEven(value)), 0);


const getEvenAndNotEvenArray = matrix => matrix.map(array => {
	const evenCnt = getEvenCount(array);
	return [array.length - evenCnt, evenCnt]
});


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(matrix);

	const matrixSorted = getMatrixSortedEvenly(matrix);

	const tableSorted = getTable(matrixSorted);

	const evenCountArray = [['нечётные','чётные']].concat(getEvenAndNotEvenArray(matrix));

	const evenCountTable = getTable(evenCountArray);

	app.innerHTML = `${tableArray}<br>${tableSorted}<br>${evenCountTable}`
});



