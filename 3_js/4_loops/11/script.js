const app = document.getElementById('app');
const x = +prompt('Введи x');
const n = +prompt('Введи n');

app.innerHTML = `x<sup>2</sup> = ${x ** n}`;
