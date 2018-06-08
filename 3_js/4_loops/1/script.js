const app = document.getElementById('app');
const number = +prompt('Введи натуральное число');
const arr = Array(number).fill(0).map((item, index)=> index + 1);
app.innerText = `${JSON.stringify(arr)}`;