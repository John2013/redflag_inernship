const number = 3223;

const digit_1 = Math.floor(number / 1000);
const digit_2 = Math.floor((number % 1000) / 100);
const digit_3 = Math.floor((number % 100) / 10);
const digit_4 = Math.floor((number % 10));

if ((digit_1 === digit_4) && (digit_2 === digit_3)){
	console.log('Полиндром')
}
else console.log('не полиндром');