const byte = Math.abs(129) % 128;

const bin_byte = +byte.toString(2);

const digit_1 = Math.floor(bin_byte / 10000000);
const digit_2 = Math.floor((bin_byte % 10000000) / 1000000);
const digit_3 = Math.floor((bin_byte % 1000000) / 100000);
const digit_4 = Math.floor((bin_byte % 100000) / 10000);

const digit_5 = Math.floor((bin_byte % 10000) / 1000);
const digit_6 = Math.floor((bin_byte % 1000) / 100);
const digit_7 = Math.floor((bin_byte % 100) / 10);
const digit_8 = Math.floor((bin_byte % 10));

if (
	(digit_1 === digit_8)
	&& (digit_2 === digit_7)
	&& (digit_3 === digit_6)
	&& (digit_4 === digit_5)
) {
	console.log('Полиндром')
}
else console.log('не полиндром');
