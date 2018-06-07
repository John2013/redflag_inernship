const a = 30, b = 100, c = 8;
//ax**2 + bx + c == 0

const D = b * b - 4 * a * c;

let x1, x2;

if (D >= 0){
	x1 = D ** .5 / 2 * a;
}

if (D > 0){
	x2 = -(D ** .5) / 2 * a;
}

console.log(x1, x2);