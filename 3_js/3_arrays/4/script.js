const array = [4, 78, 5, 1, -13, 255, -.001];

console.log(array.reduce((sum, item) => {
	if (item % 2 === 0){
		return sum + item
	}
	return sum
}));
