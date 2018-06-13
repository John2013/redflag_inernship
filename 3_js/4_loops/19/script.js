const app = document.getElementById('app');
const button = document.getElementById('button');

const isMonotoneSequence = (n) => {
	const check_char = n[0];
	for (let char of n){
		if (char !== check_char) return false
	}
	return true
};

button.addEventListener('click', () => {
	const n = (+document.getElementById('n').value).toString(8);

	app.innerText = `${n} ${isMonotoneSequence(n)}`;

});