const app = getById('app');
const button = getById('button');

/**
 * Вызывает заданную функцию для элементов на главной диагонали матрицы и аккумулирует результаты функции
 * @param matrix двумерный массив n x n
 * @param callbackFn(prevValue, currentValue, index, matrix) функция, вызывающаяся для элементов диагонали
 * @param initialValue начальное значение, если не задано, то берётся первый элемент диагонали, а цикл начинается со
 * второго элемента
 */
const matrixDiagReduce = (matrix, callbackFn, initialValue = null) => {

	let startIndex = 0;
	if (initialValue === null){
		initialValue = matrix[0][0];
		startIndex = 1;
	}

	let prevValue = initialValue;

	for (let i = startIndex; i < matrix.length; i += 1) {
		prevValue = callbackFn(prevValue, matrix[i][i], i, matrix)
	}

	return prevValue
};

const getMatrixPositivesItemsCountOnDiagonal = (matrix) => {
	const positivesCount = matrixDiagReduce(matrix, (count, value) => count + +(value > 0))
};

button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = randIntMatrix(n, n, 0, 255);

	const tableArray = getTable(matrix);

	const diagPositivesCount = getMatrixPositivesItemsCountOnDiagonal(matrix);

	app.innerHTML = `${tableArray}<br>Положительных на диагонали: ${diagPositivesCount}`
});



