const app = getById('app');
const button = getById('button');


const printDigitsAsc = n => {
	app.innerHTML = n % 10 + ' ' + app.innerHTML;
	if (n < 10) return true;

	printDigitsAsc(Math.floor(n / 10))
};


button.addEventListener('click', () => {

	const n = getNumById('n');
	app.innerHTML = '';
	printDigitsAsc(n)
});