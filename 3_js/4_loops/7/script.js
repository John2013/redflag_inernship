const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');

let dividers_arr = [1],
	checking_number = 2;

while (checking_number < number) {
	if(number % checking_number === 0){
		dividers_arr.push(checking_number)
	}
	checking_number += 1
}

const sum = (array)=>array.reduce((sum_, item)=>sum_+item);

const is_perfect = (sum(dividers_arr) === number);

app.innerText = `Число совершенное - ${is_perfect}`;
