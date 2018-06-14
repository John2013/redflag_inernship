const app = getById('app');
const button = getById('button');

const getMaxByCol = (array) =>
	array.reduce(
		(maxArray, item) => {

			item.forEach((value, index) =>
				maxArray[index] = Math.max(maxArray[index], value));

			return maxArray

		},
		Array(array[0].length).fill(0)
	);

button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randInt2dArray(n, n, 0, 255);

	const tableArray = getTable(array);

	const maxByColArray = getMaxByCol(array);

	app.innerHTML = `${tableArray}<br>максимум по колонкам: ${maxByColArray.join(', ')}`
});



