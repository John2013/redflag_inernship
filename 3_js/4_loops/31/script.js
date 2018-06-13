const app = document.getElementById('app');
const button = document.getElementById('button');

const isSimple = (number) => {
	if (number === 1) {return true}
	if (number < 1) {return false}
	let dividers_cnt = 0,
		divider = number - 1;
	while (divider !== 1) {
		if (number % divider === 0)
			dividers_cnt += 1;
		divider -= 1
	}

	return dividers_cnt === 0;
};

const getSimples = (array) => array.filter((value) => isSimple(value));


button.addEventListener('click', () => {
	const nArray = document.getElementById('nArray').value.trim().split('\n').map((i) => +i);
	const simples = getSimples(nArray);

	app.innerText = `${simples.join(', ')}: ${simples.length}`
});