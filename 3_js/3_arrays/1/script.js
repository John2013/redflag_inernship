const n = 10;

const get_range = (start, stop, step=1) => Array(stop - start).fill(start).map((x, y) => x + y * step);

function get_random_int(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

const range = get_range(-23, 34);

let result_array = Array(n).fill(0).map(()=>range[get_random_int(0, range.length - 1)]);

console.log(result_array);