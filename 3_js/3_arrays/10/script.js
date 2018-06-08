const array = [4, 0, 0, -13, 255, -0];


console.log(array.reduce((cnt_zeros, item) => {
	if (item === 0)
		return cnt_zeros + 1;
	return cnt_zeros
}, 0));
