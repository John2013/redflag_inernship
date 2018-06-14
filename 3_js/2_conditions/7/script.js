const a = 30, b = 100, c = 800;
//ax**2 + bx + c == 0

const D = b * b - 4 * a * c;

let x1, x2;

if (D >= 0){
	x1 = D ** .5 / 2 * a;
}

if (D > 0){
	x2 = -(D ** .5) / 2 * a;
}

if(x1 === undefined && x2 === undefined)
	console.log('Корней нет');

else
	console.log(x1, x2);