const app = document.getElementById('app');
const button = document.getElementById('button');

const mix = (n1, n2) => {
	n1 = n1.toString().split('');
	n2 = n2.toString().split('');
	return n1.map((item, index) => item + n2[index]).join('')
};

button.addEventListener('click', () => {
	const n1 = document.getElementById('n1').value;
	const n2 = document.getElementById('n2').value;
	app.innerText = `${mix(n1, n2)}`
});