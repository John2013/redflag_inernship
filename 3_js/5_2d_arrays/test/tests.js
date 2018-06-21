QUnit.test('rotateMatrix()', assert => {
	const matrix = [[0, 1], [2, 3]];

	assert.equal(
		JSON.stringify(rotateMatrix(matrix)),
		JSON.stringify([[0, 2], [1, 3]]),
		'матрица 01/23 → 02/13'
	)
});

QUnit.test('matrixDiagReduce()', assert => {
	const matrix = [
		[1,1,1],
		[1,1,1],
		[1,1,1]
	];
	const matrixEven = [
		[1,1,1,1],
		[1,1,1,1],
		[1,1,1,1],
		[1,1,1,1]
	];

	assert.equal(
		matrixDiagReduce(matrix,(sum, value)=> sum + value, null, true, true),
		5,
		'обе диагонали, нечёт'
	);
	assert.equal(
		matrixDiagReduce(matrixEven,(sum, value)=> sum + value, null, true, true),
		8,
		'обе диагонали, чёт'
	)
});