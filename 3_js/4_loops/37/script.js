const app = document.getElementById('app');
const button = document.getElementById('button');

const isRightBrackets = (str) => {
	const str_array = str.split('');
	let sum = 0;

	for(let char of str_array){
		if(char === '(')
			sum += 1;

		if(char === ')')
			sum -= 1;
	}

	return sum === 0
};


button.addEventListener('click', () => {
	const str = document.getElementById('str').value;

	app.innerText = `${isRightBrackets(str)}`
});