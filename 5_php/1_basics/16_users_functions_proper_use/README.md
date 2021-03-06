# Правильное использование пользовательских функций

## Примеры решения задач

**Задача**. Дан массив с числами. Создайте из него новый массив, где останутся лежать только положительные числа. Создайте для этого вспомогательную функцию isPositive, которая параметром будет принимать число и возвращать true, если число положительное, и false - если отрицательное.

**Решение**:
```php
<?php
	$arr = [1, 2, 3, -1, -2, -3];
	
	function isPositive($num) 
	{
		if ($num >= 0) {
			return true;
		} else {
			return false;
		}
	}
	
	$newArr = [];
	foreach ($arr as $elem) {
		if (isPositive($elem)) {
			$newArr[] = $elem;
		}
	}
	
	var_dump($newArr);
?>
```

## Задачи для решения
1.  Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше нуля и меньше 10. Если это так - пусть функция возвращает true, если не так - false.

1.  Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти. Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.

1.  Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.

1.  Найдите все года от 1 до 2018, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.

1.  Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.

1.  Дан массив с целыми числами. Создайте из него новый массив, где останутся лежать только четные из этих чисел. Для этого используйте вспомогательную функцию isEven из предыдущей задачи.

1.  Сделайте функцию getDivisors, которая параметром принимает число и возвращает массив его делителей (чисел, на которое делится данное число).

1.  Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих делителей. Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.