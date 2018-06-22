const app = getById('app');
const button = getById('button');


const isPowerOf2 = n => {
	if (n === 2)
		return true;

	if (n < 2)
		return false;

	return isPowerOf2(n / 2);
};


button.addEventListener('click', () => {
	const n = getNumById('n');

	app.innerHTML = `${bool2str(isPowerOf2(n))}`
});