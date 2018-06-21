const app = getById('app');
const button = getById('button');

const range = (a, b) => {
	if (typeof a !== 'object')
		return range([a], b);

	if (a[a.length - 1] === b)
		return a;

	let newValue;

	if (a[a.length - 1] < b){
		newValue = a[a.length - 1] + 1;
	}
	else {
		newValue = a[a.length - 1] - 1;
	}
	a.push(newValue);

	return range(a, b)
};


button.addEventListener('click', () => {

	const a = getNumById('a');
	const b = getNumById('b');

	app.innerHTML = `${range(a, b)}`
});