const app = document.getElementById('app');
const button = document.getElementById('button');

const isPowerOf2 = (n) => {
	if(n === 1){return true}
	let i = 1;
	while (2 ** i <= n) {
		if (2 ** i === n) return true;

		i += 1;
	}
	return false;
};

button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;


	app.innerText = `${isPowerOf2(n)}`
});