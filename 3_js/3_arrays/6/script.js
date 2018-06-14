// const n = 10;
//
// const get_range = (start, stop, step = 1) => Array(stop - start).fill(start).map((x, y) => x + y * step);
//
// const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;
//
// const range = get_range(-19, 26);
//
// let result_array = Array(n).fill(0).map(() => range[get_random_int(0, range.length - 1)]);
//
// console.log(
// 	result_array.reduce(
// 		(sum, item) => {
// 			if (item % 2 === 1) {
// 				return sum + item
// 			}
// 			return sum
// 		},
// 		0
// 	)
// );
const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

const array = [
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max)
];

console.log(
	array[1] * array[3]
);
