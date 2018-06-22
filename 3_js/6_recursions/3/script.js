const app = getById('app');
const button = getById('button');

const a = (m, n) => {
	if (m === 0)
		return n + 1;

	if (n === 0)
		return a(m - 1, 1);

	return a(m - 1, a(m, n - 1))
};


button.addEventListener('click', () => {
	const m = getNumById('m');
	const n = getNumById('n');


	app.innerHTML = `${a(m, n)}`
});