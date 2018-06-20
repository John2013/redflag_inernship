const app = getById('app');
const button = getById('button');

const range = (n) => {
	if (typeof n !== 'object')
		return range([n]);

	if (n[0] > 1)
		return range([n[0] - 1].concat(n));

	return n
};


button.addEventListener('click', () => {

	const n = getNumById('n');

	app.innerHTML = `${range(n)}`
});