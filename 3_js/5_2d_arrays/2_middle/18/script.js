const app = getById('app');
const button = getById('button');

function multiplyMatrix(A, B) {
	let rowsA = A.length, colsA = A[0].length,
		rowsB = B.length, colsB = B[0].length,
		C = [];
	if (colsA !== rowsB) return false;
	for (let i = 0; i < rowsA; i++) C[i] = [];
	for (let k = 0; k < colsB; k++) {
		for (let i = 0; i < rowsA; i++) {
			let t = 0;
			for (let j = 0; j < rowsB; j++) t += A[i][j] * B[j][k];
			C[i][k] = t;
		}
	}
	return C;
}


button.addEventListener('click', () => {
	const sellers_goods = randIntMatrix(3, 4, 0, 9);

	const goods_prise_super = randFloatMatrix(4, 2, 0.01, 100, 2);


	const sellers_goodsTable = getTable(sellers_goods);
	const goods_prise_superTable = getTable(goods_prise_super);

	const sellers_revenue_fees = multiplyMatrix(sellers_goods, goods_prise_super);

	const sellers_revenue_feesTable = getTable(sellers_revenue_fees);


	app.innerHTML = `<p>Продавцы/товары:</p>${sellers_goodsTable}` +
		`<p>Товары/цены-наценки:</p>${goods_prise_superTable}` +
		`<p>Продавцы/прибыль-коммиссионные:</p>${sellers_revenue_feesTable}`
});



