const app = document.getElementById('app');
const button = document.getElementById('button');

const isAlternatingSequence = (array) => {
	for (let i = 1; i < array.length - 1; i += 1) {
		if (
			((array[i] < array[i - 1]) && !(array[i] < array [i + 1])) ||
			((array[i] > array[i - 1]) && !(array[i] > array [i + 1])) ||
			(array[i] === array[i - 1] || array[i] === array[i + 1])
		)
			return false
	}
	return true
};


button.addEventListener('click', () => {
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);

	app.innerText = `${isAlternatingSequence(nArray)}`
});