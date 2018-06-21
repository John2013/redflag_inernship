const getById = (id) => document.getElementById(id);

const getNumById = (id) => +getById(id).value;

const randFloat = (min, max, fractionDigits = 5) => +(Math.random() * (max - min)).toFixed(fractionDigits) + min;


/**
 * Возвращает случайное целое число между min (включительно) и max (не включая max)
 * @param min {number}
 * @param max {number}
 * @returns {number}
 */
const randInt = (min, max) => Math.floor(randFloat(min, max));

const randOfArray = array => array[randInt(0, array.length - 1)];

const randChar = (chars = 'qwertyuiopasdfghjklzxcvbnm') => randOfArray(chars.split(''));

const randIntArray = (n, min, max) => Array(n).fill(0).map(() => randInt(min, max));

const randFloatArray = (n, min, max, fractionDigits = 5) => Array(n).fill(0).map(() =>
	randFloat(min, max, fractionDigits));

const randCharArray = (size, chars = 'qwertyuiopasdfghjklzxcvbnm') => Array(size).fill('').map(() => randChar(chars));

const randIntMatrix = (n, m, min, max) => Array(n).fill([]).map(() => randIntArray(m, min, max));

const randFloatMatrix = (n, m, min, max, fractionDigits = 5) => Array(n).fill([]).map(() =>
	randFloatArray(m, min, max, fractionDigits));

const randCharMatrix = (n, m, chars = 'qwertyuiopasdfghjklzxcvbnm') =>
	Array(n).fill([]).map(() =>
		randCharArray(m, chars));

const swap = (array, index1, index2) => {
	const tmp = array[index2];
	array[index2] = array[index1];
	array[index1] = tmp;
	return array
};


function rotateMatrix(matrix) {
	const len = matrix.length;
	for (let row = 0; row < len; row += 1)
		for (let col = row + 1; col < len; col += 1) {
			let tmp = matrix[row][col];
			matrix[row][col] = matrix[col][row];
			matrix[col][row] = tmp
		}

	return matrix
}


/**
 * Вызывает заданную функцию для элементов матрицы и аккумулирует результаты функции
 * @param matrix массив n x n
 * @param callbackFn(prevValue, currentValue, indexArray, matrix) функция, вызывающаяся для элементов диагонали
 * @param initialValue начальное значение, если не задано, то берётся элемент [0][0] матрицы, а цикл начинается со
 * второго элемента
 */
const matrixReduce = (matrix, callbackFn, initialValue = null) => {
	let jStartIndex = 0;
	if (initialValue === null) {
		initialValue = matrix[0][0];
		jStartIndex = 1;
	}

	let prevValue = initialValue;

	for (let i = 0; i < matrix.length; i += 1) {
		for (let j = jStartIndex; j < matrix[i].length; j += 1) {
			prevValue = callbackFn(prevValue, matrix[i][j], [i, j], this)
		}
		jStartIndex = 0;
	}

	return prevValue
};


/**
 * Вызывает заданную функцию для элементов матрицы и возвращает матрицу с результатами функции
 * @param matrix массив n x n
 * @param callbackFn(prevValue, currentValue, indexArray, matrix) функция, вызывающаяся для элементов диагонали
 */
const matrixMap = (matrix, callbackFn) => {
	let result = [];
	for (let rowIndex in matrix) {
		for (let colIndex in matrix[rowIndex]) {
			result.push(callbackFn(matrix[rowIndex][colIndex], [rowIndex, colIndex], matrix))
		}
	}

	return result
};


const isCenter = (i, size) => (size - 1) / 2 === i;


/**
 * Вызывает заданную функцию для элементов на главной диагонали матрицы и аккумулирует результаты функции
 * @param matrix двумерный массив n x n
 * @param callbackFn(prevValue, currentValue, indexes, matrix) функция, вызывающаяся для элементов диагонали
 * @param initialValue начальное значение, если не задано, то берётся первый элемент диагонали, а цикл начинается со
 * второго элемента
 * @param isMainDiagonal boolean Главная или побочная диагональ
 * @param isBoth boolean Обе диагонали (пересекающийся элемент просчитывается однажды)
 */
const matrixDiagReduce = (matrix, callbackFn, initialValue = null, isMainDiagonal = true, isBoth = false) => {

	let startIndex = 0;
	if (initialValue === null) {
		if (isMainDiagonal || isBoth)
			initialValue = matrix[0][0];

		else
			initialValue = matrix[0][matrix[0].length - 1];

		startIndex = 1;
	}

	let prevValue = initialValue;

	let j;
	for (let i = startIndex; i < matrix.length; i += 1) {
		if (isMainDiagonal || isBoth) {
			j = i;
		} else {
			j = matrix.length - 1 - i
		}
		prevValue = callbackFn(prevValue, matrix[i][j], [i, j], matrix)
	}

	if(isBoth){

		for (let i = 0; i < matrix.length; i += 1) {
			j = matrix.length - 1 - i;
			if (isCenter(j, matrix.length)) continue;
			prevValue = callbackFn(prevValue, matrix[i][j], [i, j], matrix)
		}
	}

	return prevValue
};


/**
 * Вызывает заданную функцию для столбцов матрицы и аккумулирует результаты функции
 * @param matrix двумерный массив
 * @param callbackFn(prevValue, currentValue, index, rotatedMatrix) функция, вызывающаяся для элементов диагонали
 * @param initialValue начальное значение, если не задано, то берётся первый элемент диагонали, а цикл начинается со
 * второго элемента
 */
const matrixColsReduce = (matrix, callbackFn, initialValue = null) => {

	const rotatedMatrix = rotateMatrix(matrix);

	let startIndex = 0;
	if (initialValue === null) {
		initialValue = rotatedMatrix[0];
		startIndex = 1;
	}

	let prevValue = initialValue;

	for (let index = startIndex; index < rotatedMatrix.length; index += 1) {
		prevValue = callbackFn(prevValue, rotatedMatrix[index], index, rotatedMatrix)
	}

	return prevValue
};

/**
 * Вызывает заданную функцию для столбцов матрицы и аккумулирует результаты функции
 * @param matrix двумерный массив
 * @param callbackFn(array, indexOfArray, rotatedMatrix) функция, обрабатывающая элементы массива
 */
const matrixColsMap = (matrix, callbackFn) => {

	const rotatedMatrix = rotateMatrix(matrix);

	return rotatedMatrix.map((col, indexOfCol, rotatedMatrix) => callbackFn(col, indexOfCol, rotatedMatrix))
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

const getList = array => {
	let list = '<ul>';

	array.forEach(value => list += `<li>${value}</li>`);

	return list + '</ul>'
};


const getItemsByCoordsStr = (matrix, indexes) =>
	indexes.map((ids) => `${matrix[ids[0]][ids[1]]}[${ids[0]}][${ids[1]}]`).join('; ');


const readList = (str) => str.trim().split('\n');

const readNumList = (str) => readList(str).map((i) => +i);


const countBy = (array) => {
	let count = {};
	array.forEach(val => count[val] = (count[val] || 0) + 1);
	return count;
};