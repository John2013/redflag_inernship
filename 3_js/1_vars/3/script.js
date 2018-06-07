const number = 15;

const bin_number = +(number.toString(2));

let ones_count =
	Math.floor(bin_number/1000) +
	Math.floor((bin_number%1000)/100) +
	Math.floor((bin_number%100)/10) +
	Math.floor((bin_number%10));



console.log(ones_count);