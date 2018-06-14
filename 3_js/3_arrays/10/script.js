// const array = [4, 0, 0, -13, 255, -0];
//
//
// console.log(array.reduce((cnt_evens, item) => {
// 	if (item === 0)
// 		return cnt_evens + 1;
// 	return cnt_evens
// }, 0));

const array = [4, 0, 0, -13, 255];

let cnt_zeros = 0;

if (array[0] === 0) cnt_zeros += 1;
if (array[1] === 1) cnt_zeros += 1;
if (array[2] === 2) cnt_zeros += 1;
if (array[3] === 3) cnt_zeros += 1;
if (array[4] === 4) cnt_zeros += 1;

console.log(cnt_zeros);