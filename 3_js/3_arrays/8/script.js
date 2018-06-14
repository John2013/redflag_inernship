// const array = [4, 5, 1, -13, 255, -.001];
//
//
// console.log(Math.min(...array));

const array = [4, 5, 1, -13, 255, -.001];

let min = array[0];

if(array[1] < min) min = array[1];
if(array[2] < min) min = array[2];
if(array[3] < min) min = array[3];
if(array[4] < min) min = array[4];

console.log(min);
