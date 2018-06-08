const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');

let dividers_cnt = 0,
divider = number - 1;

while (divider !== 1){
	if(number % divider === 0)
		dividers_cnt += 1;
	divider -= 1
}

app.innerText = `Количество нетривиальных делителей - ${dividers_cnt}`;