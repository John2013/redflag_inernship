const app = getById('app');
const button = getById('button');


const printDigitsDesc = n => {
	app.innerHTML += n % 10 + ' ';
	if (n < 10) return true;

	printDigitsDesc(Math.floor(n / 10))
};


button.addEventListener('click', () => {

	const n = getNumById('n');
	app.innerHTML = '';
	printDigitsDesc(n)
});