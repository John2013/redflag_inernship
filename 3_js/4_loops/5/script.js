const app = document.getElementById('app');


const button = document.getElementById('button');


button.addEventListener('click', () => {
	const array = document.getElementById('array')
		.value
		.trim()
		.split('\n')
		.map((item)=>+item);

	app.innerText = '' + array.reduce(
		(sum, array_item, currentIndex) => {
			if((currentIndex + 1) % 2 === 0){
				return sum + array_item
			}
			return sum
		},
		0
	);
});
