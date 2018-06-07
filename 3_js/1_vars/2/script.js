const number = 321;

const digit_1 = Math.floor(number/100);
const digit_2 = Math.floor((number%100)/10);
const digit_3 = Math.floor((number%10));

const reversed_number = +('' + digit_3 + digit_2 + digit_1);

console.log(reversed_number);