const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');

let divider = number - 1;
while (number % divider !==0){
	divider -= 1
}

app.innerText = `наибольший нетривиальный делитель - ${divider}`;