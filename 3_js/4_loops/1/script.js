const app = document.getElementById('app');
const n = 10;

const get_range = (start, stop, step = 1) => Array(stop - start).fill(start).map((x, y) => x + y * step);

const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

const range = get_range(-23, 34);

const get_random_array =
	(n, range_array) => Array(n).fill(0).map(() => range_array[get_random_int(0, range_array.length - 1)]);

let result_array = get_random_array(n, range);

app.innerText = JSON.stringify(result_array);
