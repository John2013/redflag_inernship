// const n = 10, t = 30;
//
// const get_range = (start, stop, step=1) => Array(stop - start).fill(start).map((x, y) => x + y * step);
//
// const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;
//
// const range = get_range(-56, 47);
//
// let result_array = Array(n).fill(0).map(()=>range[get_random_int(0, range.length - 1)]);
//
//
//
// console.log(
// 	result_array.reduce(
// 		(sum = 0, item) => {
// 			if (item > t){
// 				return sum + item
// 			}
// 			return sum;
// 		},
// 		0
// 	)
// );
const t = 30;

const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

const min = -56, max = 47;

const array = [
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max),
	get_random_int(min, max)
];

let product = 1;

if (array[0] > t) {
	product *= item
}
if (array[2] > t) {
	product *= item
}
if (array[4] > t) {
	product *= item
}

console.log(
	product
);
