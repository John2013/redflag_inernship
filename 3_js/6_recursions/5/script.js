const app = getById('app');
const button = getById('button');

const tensOf = n => Math.floor(n / 10);

const sumOfDigits = (n, sum=0) => {
	sum += 1;

	if (n < 10)
		return sum;

	return sumOfDigits(tensOf(n), sum)
};


button.addEventListener('click', () => {

	const n = getNumById('n');

	app.innerHTML = `${sumOfDigits(n)}`
});