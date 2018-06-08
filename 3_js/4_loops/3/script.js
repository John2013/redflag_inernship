const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');

let divider = 2;

while (number % divider !==0){
	divider += 1
}

app.innerText = `наименьший нетривиальный делитель - ${divider}`;