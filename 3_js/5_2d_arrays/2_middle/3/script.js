const app = getById('app');
const button = getById('button');

const getMaxSumRow = (matrix) =>{
	const sumArray = matrix.map((i)=>i.reduce((sum, value)=> sum + value));
	return sumArray.reduce(
		(maxRowSumIndex, rowSum, index, thisArray)=>{
			if(rowSum > thisArray[maxRowSumIndex])
				return index;

			return maxRowSumIndex
		},
		0
	);
};



button.addEventListener('click', () => {
	const n = getNumById('n');

	const array = randIntMatrix(n, n, 0, 9);

	const tableArray = getTable(array);

	const maxRowIndex = getMaxSumRow(array);

	app.innerHTML = `${tableArray}<br>Номер максимальной строки: ${maxRowIndex}; сумма: ${array[maxRowIndex].reduce((s,v)=>s+v)}`
});



