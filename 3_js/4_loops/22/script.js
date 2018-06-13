const app = document.getElementById('app');
const button = document.getElementById('button');

const getFactors = (n) => {
	if(n === 1) return [1];

	let factor = 2;
	let factorsList = [];

	while (n !== 0) {
		if(n % factor === 0){
			factorsList.push(factor);
			n /= factor
		}
		else factor += 1;

		if(factor > n) break;
	}

	return factorsList
};

button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;
	app.innerText = `${n} = ${getFactors(n).join(' * ')}`
});