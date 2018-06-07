const number = 3283;

const digit_1 = Math.floor(number / 1000);
const digit_2 = Math.floor((number % 1000) / 100);
const digit_3 = Math.floor((number % 100) / 10);
const digit_4 = Math.floor((number % 10));

if ((digit_1 + digit_2) === (digit_3 + digit_4)){
	console.log('счастливый')
}
else console.log('не счастливый');