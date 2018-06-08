const app = document.getElementById('app');
const array = [4, 0, 0, -13, 255, -0];


app.innerText = `${JSON.stringify(array)}\nколичество чётных элементов: ${Math.floor(array.length/2)}`;