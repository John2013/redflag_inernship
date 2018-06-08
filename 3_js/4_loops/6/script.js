const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');

let simples_array = [2,],
	checking_number = 3;

while (simples_array.length < number){
	let dividers_cnt = 0,
		divider = checking_number - 1;

	while (divider !== 1){
		if(checking_number % divider === 0)
			dividers_cnt += 1;
		divider -= 1
	}

	if (dividers_cnt === 0) {
		simples_array.push(checking_number)
	}
	checking_number += 1
}

app.innerText = `Простые числа - ${JSON.stringify(simples_array)}`;