const app = document.getElementById('app');
let number1 = +prompt('Введи натуральное число');
let number2 = +prompt('Введи второе натуральное число');

const is_divider = (number, divider) => number % divider === 0;

if (number1 > number2){
	const tmp = number2;
	number2 = number1;
	number1 = tmp
}

let nok = number2 + 1;

while(!(is_divider(nok,number1) && is_divider(nok,number2))){
	nok += 1
}

app.innerText =`НОК(${number1},${number2}) = ${nok}`;