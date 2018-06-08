const app = document.getElementById('app');
let number1 = +prompt('Введи натуральное число');
let number2 = +prompt('Введи второе натуральное число');

const is_divider = (number, divider) => number % divider === 0;

if (number1 > number2){
	const tmp = number2;
	number2 = number1;
	number1 = tmp
}

let checking_number = number1;

while (!(is_divider(number1, checking_number) && is_divider(number2, checking_number))){

	checking_number -= 1
}

app.innerText = `НОД(${number1},${number2}) = ${checking_number}`;