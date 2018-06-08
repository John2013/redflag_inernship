const app = document.getElementById('app');
const n = 10;

const get_range = (start, stop, step = 1) => Array(stop - start).fill(start).map((x, y) => x + y * step);

const get_random_int = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

const get_random_array =
	(n, range_array) => Array(n).fill(0).map(() => range_array[get_random_int(0, range_array.length - 1)]);

const array = get_random_array(n, get_range(-19, 26));

const product = array.reduce((prod, item, index) => {
	if((index + 1) % 2 === 1){
		return prod * item
	}
	return prod
});

app.innerText = JSON.stringify(array) + '\nпроизведение нечётных: ' + product;
