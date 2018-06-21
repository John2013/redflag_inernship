const app = getById('app');
const button = getById('button');

const range = (n) => {
	if (typeof n !== 'object')
		return range([n]);

	if (n[0] > 0)
		if (n[0] > 1)
			return range([n[0] - 1].concat(n));

		else if (n[n.length - 1] < 1)
			return range(n.concat([(n[n.length - 1] + 1)]));

	return n
};


button.addEventListener('click', () => {

	const n = getNumById('n');

	app.innerHTML = `${range(n)}`
});