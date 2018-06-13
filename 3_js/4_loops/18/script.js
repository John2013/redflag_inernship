const app = document.getElementById('app');
const button = document.getElementById('button');

const reverseNumber = (n) => {

	n = Math.abs(n).toString();
	let reversed = '';
	for (let i = n.length-1; i >= 0; i -= 1){
		reversed += n[i];
	}

	return +reversed
};

button.addEventListener('click', () => {
	const n = +document.getElementById('n').value;
	app.innerText = reverseNumber(n)
});