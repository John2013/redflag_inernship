const app = document.getElementById('app');
const button = document.getElementById('button');

const isPalindrom = (n) => {
	const nArray = n.split('').map((item) => +item);
	let half1 = [], half2 = [];
	for (let index in nArray){
		index = +index;
		if((index + 1) <= nArray.length / 2){
			half1.push(nArray[index])
		}
		else if (index + .5 === nArray.length / 2)
			continue;
		else {
			half2.push(nArray[index])
		}
	}

	return half1.join('') === half2.reverse().join('')
};

button.addEventListener('click', () => {
	const n = document.getElementById('n').value;


	app.innerText = `${isPalindrom(n)}`
});