const app = getById('app');
const button = getById('button');

const swap2randomRows = (array) => {
	if (array.length <= 1) return array;
	const row1index = randInt(0, array.length);
	let row2index;
	do {
		row2index = randInt(0, array.length)
	} while (row2index === row1index);

	return swapInArray(array, row1index, row2index)
};


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 255);

	const tableArray = getTable(array);

	const array2 = swap2randomRows(array);

	const table2Array = getTable(array2);

	app.innerHTML = `${ tableArray }<br>${ table2Array }`
});



