const app = document.getElementById('app');
const button = document.getElementById('button');

// к чёрту псевдографику, у нас не консоль

const get_table = (data) => {
	let table = '<table>';

	for (let row of data){

		table += '<tr>';

		for (let cell of row){

			table += `<td>${cell}</td>`;

		}

		table += '</tr>'
	}

	table += '</table>';
	return table;
};

const get_squares_qubics_array = (x) => {
	let array = [['x', 'x<sup>2</sup>', 'x<sup>3</sup>']];
	for(let i = 1; i <= x; i += 1){
		array.push([i, i**2, i**3])
	}
	return array
};

button.addEventListener('click', () => {
	const x = +document.getElementById('x').value;
	app.innerHTML = get_table(get_squares_qubics_array(x))
});