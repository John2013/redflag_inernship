const app = document.getElementById('app');
const button = document.getElementById('button');

const isMonotoneSequence = (array) => {
	let isIncreasing = null;

	for (let i = 1; i < array.length; i += 1) {
		if (isIncreasing === null) {
			if (array[i] > array[i - 1])
				isIncreasing = true;

			else if (array[i] < array[i - 1])
				isIncreasing = false;

			continue;
		}

		if (
			(isIncreasing && array[i] < array[i - 1])
			||
			(isIncreasing === false && array[i] > array[i - 1])
		)
			return false

	}
	return true
};


button.addEventListener('click', () => {
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);

	app.innerText = `${isMonotoneSequence(nArray)}`
});