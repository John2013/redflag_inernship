let array = [4, 5, 1, -13, 255, -1];

const swap = (array, index1, index2) => {
	const tmp = array[index2];
	array[index2] = array[index1];
	array[index1] = tmp;
	return array
};

array = swap(array, 0, 1);
array = swap(array, 2, 3);
array = swap(array, 4, 5);

console.log(array);
