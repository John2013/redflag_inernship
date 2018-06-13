const app = document.getElementById('app');
const button = document.getElementById('button');

const isHappy = (array) => {
	let half1sum = 0;
	let half2sum = 0;
	for (let index in array) {
		if (array.length % 2 !== 0 && +index === Math.floor(array.length / 2)) continue;

		if (index < (array.length - 1) / 2) {
			half1sum += array[index]
		}
		else {
			half2sum += array[index]
		}
	}

	return half1sum === half2sum
};

button.addEventListener('click', () => {
	const nArray = document.getElementById('n').value.split('').map((item) => +item);


	app.innerText = `${isHappy(nArray)}`
});