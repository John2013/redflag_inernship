const getById = (id) => document.getElementById(id);

const getNumById = (id) => +getById(id).value;

const randInt = (min, max) => Math.floor(Math.random() * (max - min)) + min;

const randIntArray = (n, min, max) => Array(n).fill(0).map(() =>randInt(min, max));

const randIntMatrix = (n, m, min, max) => Array(n).fill([]).map(() => randIntArray(m, min, max));

/**
 * Вызывает заданную функцию для элементов матрицы и аккумулирует результаты функции
 * @param callbackFn(prevValue, currentValue, indexArray, matrix) функция, вызывающаяся для элементов диагонали
 * @param initialValue начальное значение, если не задано, то берётся элемент [0][0] матрицы, а цикл начинается со
 * второго элемента
 */
Object.defineProperty(Array.prototype, 'matrixReduce', {

	value: (callbackFn, initialValue = null) => {
		let jStartIndex = 0;
		if (initialValue === null){
			initialValue = this[0][0];
			jStartIndex = 1;
		}

		let prevValue = initialValue;

		for (let i = 0; i < this.length; i += 1) {
			for (let j = jStartIndex; j < this[i].length; j += 1){
				prevValue = callbackFn(prevValue, this[i][j], [i, j], this)
			}
		}

		return prevValue
	},
	enumerable: false,

});

const swapInArray = (array, index1, index2) => {
	const tmp = array[index2];
	array[index2] = array[index1];
	array[index1] = tmp;
	return array
};


const getTable = (array) => {
	let table = '<table>';
	for (let row of array) {
		table += '<tr>';
		for (let cell of row)
			table += `<td>${cell}</td>`;

		table += '</tr>'
	}
	return table + '</table>';
};

const readList = (str) => str.trim().split('\n');

const readNumList = (str) => readList(str).map((i) => +i);