const n = 10;

const get_range = (start, stop, step=1) => Array(stop - start).fill(start).map((x, y) => x + y * step);

const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

const range = get_range(-20, 25);

const get_random_array =
	(n, range_array) => Array(n).fill(0).map(()=>range_array[get_random_int(0, range_array.length - 1)]);

const result_array = get_random_array(n, range);

const min = Math.min(...result_array);

console.log(
	result_array.indexOf(min)
);
