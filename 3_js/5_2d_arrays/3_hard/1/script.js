const app = getById('app');
const button = getById('button');


const getIteratingMatrix = n => {
	let matrix = [Array(n).fill(0).map((_,index) => index + 1)];
	let onePosition = 0;
	for (let i = 1; i < n; i += 1){
		let newRow = [];
		for (let j = 0; j < n; j += 1){
			if(onePosition >= j){
				newRow.push(matrix[i - 1][j] + 1)
			}
			else {
				newRow.push(matrix[i - 1][j] - 1)
			}
		}
		matrix.push(newRow);
		onePosition += 1;
	}

	return matrix;
};


button.addEventListener('click', () => {
	const n = getNumById('n');

	const matrix = getIteratingMatrix(n);

	const matrixTable = getTable(matrix);

	app.innerHTML = `${matrixTable}`
});