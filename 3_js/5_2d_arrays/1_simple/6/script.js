const app = getById('app');
const button = getById('button');

// В двумерном массиве натуральных случайных чисел от 0 до 199 найти количество всех двухзначных чисел, у которых сумма
// цифр кратная 2.

const countOfEven2DigetsNumbers = (array) =>
	matrixReduce(
		array,
		(array, count, value) => {

			const digitsArray = value.toString().split('').map((i) => +i);
			const digitsSum = digitsArray.reduce((sum, value) => sum + value);

			if (digitsArray.length === 2 && digitsSum % 2 === 0)
				return count + 1;


			return count
		},
		0
	);


button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 199);

	const count = countOfEven2DigetsNumbers(array);

	const tableArray = getTable(array);

	app.innerHTML = `${tableArray}<br>количество всех двухзначных чисел, у которых сумма цифр кратная 2: ${count}`
});



