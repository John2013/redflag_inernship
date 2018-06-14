const getById = (id) => document.getElementById(id);

const getNumById = (id) => +getById(id).value;

const randInt = (min, max) => Math.floor(Math.random() * (max - min)) + min;

const randIntArray = (n, min, max) => Array(n).fill(0).map(() =>randInt(min, max));

const randInt2dArray = (n, m, min, max) => Array(n).fill([]).map(() => randIntArray(m, min, max));

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