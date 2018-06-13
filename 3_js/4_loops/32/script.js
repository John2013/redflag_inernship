const app = document.getElementById('app');
const button = document.getElementById('button');

const getFirstChar = (str) => str.toString().split('')[0];
const getLastChar = (str) => str.toString().split('').pop();

const isCorrect = (array) => {
	for(let index = 1; index < array.length; index += 1){
		if (getLastChar(array[index - 1]) !== getFirstChar(array[index]))
			return false
	}

	return true
};


button.addEventListener('click', () => {
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);

	app.innerText = `${isCorrect(nArray)}`
});