const app = document.getElementById('app');
const button = document.getElementById('button');

const isDivider = (number, divider) => number % divider === 0;

const maxCommonDivider = (n, m) => {
	if (n > m) {
		const tmp = m;
		m = n;
		n = tmp
	}

	let checking_number = n;

	while (!(isDivider(n, checking_number) && isDivider(m, checking_number))) {

		checking_number -= 1
	}
	if (checking_number === 1) return false;
	return checking_number
};

button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;
	const m = +document.getElementById('m').value;

	app.innerText = `НОД(${n},${m}) = ${maxCommonDivider(n, m) || '-'}`
});