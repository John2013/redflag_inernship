const array = [4, 78, 555, -13, 255, -0];

console.log(array.reduce((cnt_evens, item) => {
	if (item % 2 === 0)
		return cnt_evens + 1;
	return cnt_evens
}, 0));