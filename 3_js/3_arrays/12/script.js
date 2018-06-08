const array = [4, 5, 1, -13, 255, -.001], C = 3;
let cnt = 0;
let array_sum = 0;

if(array[0] > C){
	cnt += 1;
	array_sum += array[0]
}
if(array[1] > C){
	cnt += 1;
	array_sum += array[1]
}
if(array[2] > C){
	cnt += 1;
	array_sum += array[2]
}
if(array[3] > C){
	cnt += 1;
	array_sum += array[3]
}
if(array[4] > C){
	cnt += 1;
	array_sum += array[4]
}
if(array[5] > C){
	cnt += 1;
	array_sum += array[5]
}
console.log(array_sum/cnt);
