const app = document.getElementById('app');
const number1 = +prompt('Введи натуральное число');
const number2 = +prompt('Введи второе натуральное число');

const get_dividers_array = (number) => {
	let dividers_arr = [1],
		checking_number = 2;

	while (checking_number < number) {
		if(number % checking_number === 0){
			dividers_arr.push(checking_number)
		}
		checking_number += 1
	}
	return dividers_arr
};

const sum = (array)=>array.reduce((sum_, item)=>sum_+item);

const dividers_array_1 = get_dividers_array(number1);
const dividers_array_2 = get_dividers_array(number2);

const is_friendly = ((sum(dividers_array_1) === number2) && sum(dividers_array_2) === number1);


app.innerText = `${JSON.stringify(dividers_array_1)} = ${sum(dividers_array_1)}
${JSON.stringify(dividers_array_2)} = ${sum(dividers_array_2)}
Числа дружественные - ${is_friendly}`;
