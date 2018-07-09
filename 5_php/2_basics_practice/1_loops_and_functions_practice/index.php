<?
require '../../base.php';

use Michelf\MarkdownExtra;

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?
echo MarkdownExtra::defaultTransform(file_get_contents('./README.md'));
?>
<h3>Отработка циклов</h3>
<ol>
	<li>
		<p>Выведите с помощью цикла столбец чисел от 1 до 100.</p>
		<?
		for ($i = 1; $i <= 100; $i += 1) {
			echo $i . "<br>\n";
		}
		?>
	</li>
	<li>
		<p>Выведите с помощью цикла столбец четных чисел от 1 до 100.</p>
		<?
		for ($i = 2; $i <= 100; $i += 2) {
			echo $i . "<br>\n";
		}
		?>
	</li>
	<li>
		<p>Найдите с помощью цикла сумму чисел от 1 до 100.</p>
		<?
		$sum = 0;
		for ($i = 1; $i <= 100; $i += 1) {
			$sum += $i;
		}
		?>
		<p><?= $sum ?></p>
	</li>
	<li>
		<p>Найдите с помощью цикла сумму квадратов чисел от 1 до 15.</p>
		<?
		$sum = 0;
		for ($i = 1; $i <= 15; $i += 1) {
			$sum += $i ** 2;
		}
		?>
		<p><?= $sum ?></p>
	</li>
	<li>
		<p>Найдите с помощью цикла сумму корней чисел от 1 до 15. Результат округлите до двух знаков после дробной
			части.</p>
		<?
		$sum = 0;
		for ($i = 1; $i <= 15; $i += 1) {
			$sum += $i ** .5;
		}
		?>
		<p><?= round($sum, 2) ?></p>
	</li>
	<li>
		<p>Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7.</p>
		<?
		$sum = 0;
		for ($i = 1; $i <= 100; $i += 1) {
			$sum += $i % 7 == 0 ? $i : 0;
		}
		?>
		<p><?= $sum ?></p>
	</li>
	<li>
		<p>Заполните массив 10-ю иксами с помощью цикла.</p>
		<?
		$array = [];
		for ($i = 0; $i < 10; $i += 1) {
			$array[] = 'x';
		}
		?>
		<p><?= var_export($array) ?></p>
	</li>
	<li>
		<p>Заполните массив числами от 1 до 10 с помощью цикла.</p>
		<?
		$array = [];
		for ($i = 1; $i <= 10; $i += 1) {
			$array[] = $i;
		}
		?>
		<p><?= var_export($array) ?></p>
	</li>
	<li>
		<p>Заполните массив числами от 10 до 1 с помощью цикла.</p>
		<?
		$array = [];
		for ($i = 10; $i >= 1; $i -= 1) {
			$array[] = $i;
		}
		?>
		<p><?= var_export($array) ?></p>
	</li>
	<li>
		<p>Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла.</p>
		<?
		$array = [];
		for ($i = 0; $i < 10; $i += 1) {
			$array[] = rand(1, 10);
		}
		?>
		<p><?= var_export($array) ?></p>
	</li>
	<li>
		<p>С помощью цикла создайте строку из 6-ти символов, состоящую из случайных чисел от 1 до 9.</p>
		<?
		$str = '';
		for ($i = 0; $i < 6; $i += 1) {
			$str .= rand(1, 9);
		}
		?>
		<p><?= var_export($str) ?></p>
	</li>
	<li>
		<p>Дан массив с числами. С помощью цикла найдите сумму элементов этого массива.</p>
		<?
		$array = [];
		for ($i = 0; $i < 5; $i += 1) {
			$array[] = rand(1, 10);
		}
		?>
		<p><?= var_export($array) ?></p>
		<p><?= array_sum($array) ?></p>
	</li>
	<li>
		<p>Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива.</p>
		<?
		$array = [];
		for ($i = 0; $i < 5; $i += 1) {
			$array[] = rand(1, 10);
		}
		?>
		<p><?= var_export($array) ?></p>
		<p><?= array_reduce($array, function ($sum, $item) {
				return $sum + $item ** 2;
			}) ?></p>
	</li>
	<li>
		<p>Дан массив с числами. С помощью цикла найдите корень из суммы квадратов элементов этого массива. Результат
			округлите в меньшую сторону до целых.</p>
		<?
		$array = [];
		for ($i = 0; $i < 10; $i += 1) {
			$array[] = rand(1, 10);
		}
		?>
		<p><?= var_export($array) ?></p>
		<p><?= round(array_reduce($array, function ($sum, $item) {
					return $sum + $item ** 2;
				}) ** .5, -1) ?></p>
	</li>
	<li>
		<p>Дан массив с числами. Найдите сумму тех элементов массива, которые больше 0 и меньше 10.</p>
		<?
		$array = [];
		for ($i = 0; $i < 5; $i += 1) {
			$array[] = rand(-10, 20);
		}
		?>
		<p><?= var_export($array) ?></p>
		<p><?= array_reduce($array, function ($sum, $item) {
				return $sum + (($item > 0 && $item < 10) ? $item : 0);
			}, 0) ?></p>
	</li>
	<li>
		<p>Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд.</p>
		<?
		$array = [];
		for ($i = 0; $i < 10; $i += 1) {
			$array[] = rand(0, 1);
		}
		?>
		<p><?= var_export($array) ?></p>
		<?
		function is3same($array)
		{
			$sameCnt = 0;
			$sameValue = null;
			foreach ($array as $index => $value) {
				if ($value === $sameValue) {
					$sameCnt += 1;
					if ($sameCnt >= 3) {
						return true;
					}
				} else {
					$sameValue = $value;
					$sameCnt = 1;
				}
			}
			return false;
		}

		?>
		<p><?= var_export(is3same($array)) ?></p>
	</li>
	<li>
		<p>С помощью цикла сформируйте строку '1223334444...' и так далее до заданного числа.</p>
		<?
		function repeat($n)
		{
			$str = '';
			for ($i = 0; $i < $n; $i += 1) {
				$str .= $n;
			}
			return $str;
		}

		$n = 9;
		$str = '';
		for ($i = 1; $i <= $n; $i++) {
			$str .= repeat($i);
		}
		?>
		<p><?= $str ?></p>
	</li>
	<li>
		<p>Дан многомерный массив (см. его под задачей). С помощью цикла выведите строки в формате 'имя-зарплата'.</p>
		<pre>
$arr = [
	0=>['name'=>'Коля', 'salary'=>300],
	1=>['name'=>'Вася', 'salary'=>400],
	2=>['name'=>'Петя', 'salary'=>500],
];
		</pre>
		<?
		$arr = [
			0 => ['name' => 'Коля', 'salary' => 300],
			1 => ['name' => 'Вася', 'salary' => 400],
			2 => ['name' => 'Петя', 'salary' => 500],
		];
		?>
		<ol>
			<?
			foreach ($arr as $user) {
				echo "<li>{$user['name']}-{$user['salary']}</li>";
			}
			?>
		</ol>
	</li>
	<li>
		<p>Заполните двумерный массив случайными числами от 1 до 10. В каждом подмассиве должно быть по 10 элементов.
			Должно быть 10 подмассивов.</p>
		<?
		$array = [];
		for ($i = 0; $i < 10; $i += 1) {
			$innerArray = [];
			for ($j = 0; $j < 10; $j += 1)
				$innerArray[] = rand(1, 10);
			$array[] = $innerArray;
		}
		?>
		<pre><?= var_export($array) ?></pre>
	</li>
</ol>

<h3>Практика</h3>

<ol>
	<li>
		<p>Напишите свой аналог функции ucfirst (аналог - значит можно использовать все, что угодно, кроме этой
			функции).</p>

		<?
		function my_ucfirst($str)
		{
			$str[0] = mb_strtoupper($str[0]);
			return $str;
		}

		$str = my_ucfirst('qwerty')
		?>
		<p><?= $str ?></p>
	</li>
	<li>
		<p>Напишите свой аналог функции strrev. Решите задачу двумя способами.</p>
		<?
		function my_strrev($str)
		{
			$reverted = '';
			$array = str_split($str);
			foreach ($array as $char)
				$reverted = $char . $reverted;
			return $reverted;
		}

		function my_strrev2($str)
		{
			$reverted = '';
			$array = str_split($str);
			for ($i = count($array) - 1; $i >= 0; $i -= 1)
				$reverted .= $array[$i];
			return $reverted;
		}

		$str = my_strrev('qwerty');
		$str2 = my_strrev2('asdfgh');
		?>
		<p><?= $str ?></p>
		<p><?= $str2 ?></p>
	</li>
	<li>
		<p>Напишите свой аналог функции strlen.</p>
		<?
		function my_strlen($str)
		{
			return count(str_split($str));
		}

		?>
		<p>qwerty</p>
		<p><?= my_strlen('qwerty') ?></p>
	</li>
	<li>
		<p>Поменяйте в строке большие буквы на маленькие и наоборот.</p>
		<?
		function upper_lower_switch($str)
		{
			$lower = str_split('qwertyuiopasdfghjklzxcvbnm');
			$upper = str_split('QWERTYUIOPASDFGHJKLZXCVBNM');

			$res = '';
			foreach (str_split($str) as $letter) {
				if (in_array($letter, $lower)) {
					$current_array = $lower;
					$another_array = $upper;
				} else {
					$current_array = $upper;
					$another_array = $lower;
				}
				$letter_number = array_search($letter, $current_array);
				$res .= $another_array[$letter_number];
			}

			return $res;
		}

		$str = 'tyFjjEbsaERTnS'
		?>
		<p><?= $str ?></p>
		<p><?= upper_lower_switch($str) ?></p>
	</li>
	<li>
		<p>Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми стоками такого
			рода.</p>
		<?
		function camel2snakeCase($str)
		{
			$lower = str_split('qwertyuiopasdfghjklzxcvbnm');
			$upper = str_split('QWERTYUIOPASDFGHJKLZXCVBNM');
			$str = str_split($str);

			foreach ($str as $index => $char) {
				$uppersIndex = array_search($char, $upper);
				if ($uppersIndex && $index > 0) {
					$str[$index] = '_' . $lower[$uppersIndex];
				}
			}

			return implode($str);
		}

		function snake2camelCase($str)
		{
			$lower = str_split('qwertyuiopasdfghjklzxcvbnm');
			$upper = str_split('QWERTYUIOPASDFGHJKLZXCVBNM');
			$str = str_split($str);

			foreach ($str as $index => $char) {
				$lowersIndex = array_search($char, $lower) ?: array_search($char, $upper);
				if ($str[$index - 1] == '_' && $lowersIndex) {
					$str[$index - 1] = '';
					$str[$index] = $upper[$lowersIndex];
				}
			}

			return implode($str);
		}

		$str = 'var_text_Hello';
		?>
		<p><?= snake2camelCase($str) ?></p>
	</li>
	<li>
		<p>С помощью только одного цикла нарисуйте следующую пирамидку:</p>
		<pre>
1
22
333
4444
55555
666666
7777777
88888888
999999999
		</pre>
		<pre><?
			for ($i = 1; $i < 10; $i += 1) {
				echo str_repeat($i, $i) . "\n";
			}
			?></pre>
	</li>
	<li>
		<p>Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть не 5 рядов, а произвольное
			количество, оно задается так: $str = 'xxxxxxxx'; - это первый ряд пирамиды.</p>
		<pre>
xxxxx
xxxx
xxx
xx
x
		</pre>
		<pre><?
			$str = str_split('xxxxxxxx');
			while (count($str)) {
				echo implode('', $str) . "\n";
				array_pop($str);
			}
			?></pre>

	</li>
	<li>
		<p>Дан массив с произвольными числами. Сделайте так, чтобы элемент повторился в массиве количество раз,
			соответствующее его числу. Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4].</p>
		<?
		$arr = [1, 3, 2, 4, 7, 2];
		$result = [];
		foreach ($arr as $int) {
			for ($i = 0; $i < $int; $i += 1) {
				$result[] = $int;
			}
		}
		?>
		<p>[<?= implode(";", $arr) ?>]</p>
		<p>[<?= implode(";", $result) ?>]</p>
	</li>
	<li>
		<p>Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом второго элемента,
			третий элемент - ключом четвертого и так далее. Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4,
			5=>6].</p>
		<?
		$arr = [1, 2, 3, 4, 5, 6];
		$result = [];
		for ($i = 1; $i < count($arr); $i += 2) {
			$result[$i] = $arr[$i];
		}
		?>
		<p>[<?= implode(";", $arr) ?>]</p>
		<p><?= var_export($result) ?></p>
	</li>
	<li>
		<p>Дана строка. Удалите из этой строки четные символы.</p>
		<?
		$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, non.';

		function del_even_chars($str)
		{
			$str = str_split($str);
			for ($i = 1; $i < count($str); $i += 2) {
				$str[$i] = '';
			}
			return implode($str);
		}

		?>
		<p><?= $str ?></p>
		<p><?= del_even_chars($str) ?></p>
	</li>
	<li>
		<p>Дана строка. Поменяйте ее первый символ на второй и наоборот, третий на четвертый и наоборот, пятый на шестой
			и наоборот и так далее. То есть из строки '12345678' нужно сделать '21436587'.</p>
		<?
		$str = str_split('12345678');
		$result = '';
		for ($i = 1; $i < count($str); $i += 2) {
			$result .= $str[$i] . $str[$i - 1];
		}
		?>
		<p><?= $result ?></p>
	</li>
	<li>
		<p>Сделайте аналог функции array_unique.</p>
		<?
		function my_array_unique($array)
		{
			$was_exists = [];
			$new_array = [];
			foreach ($array as $item) {
				if (in_array($item, $was_exists))
					continue;

				$new_array[] = $item;
				$was_exists[] = $item;
			}

			return $new_array;
		}

		$arr = [5, 7, 7, 4, 5, 8, 8, 9, 5, 4, 2, 1, 7, 0, 0, 5, 5, 4, 8, 7, 5, 3, 7];
		?>
		<p>[<?= implode(',', $arr) ?>]</p>
		<p>[<?= implode(',', my_array_unique($arr)) ?>]</p>
	</li>
	<li>
		<p>Сделайте функцию, противоположную функции array_unique. Ваша функция должна оставлять дубли и удалять
			элементы, не имеющие дублей.</p>
		<?
		function array_ununique($array)
		{
			$counts = array_count_values($array);
			foreach ($counts as $item => $count) {
				if ($count == 1) {
					unset($array[array_keys($array, $item)[0]]);
				}
			}
			return $array;
		}

		$arr = [5, 7, 7, 4, 5, 8, 8, 9, 5, 4, 2, 1, 7, 0, 0, 5, 5, 4, 8, 7, 5, 3, 7];
		?>
		<p>[<?= implode(',', $arr) ?>]</p>
		<p>[<?= implode(',', array_ununique($arr)) ?>]</p>
	</li>
	<li>
		<p>Напишите скрипт, который проверяет, является ли данное число простым (простое число - это то, которое делится
			только на 1 и на само себя).</p>
		<?
		function isSimilar($number)
		{
			for ($divider = $number - 1; $divider > 1; $divider -= 1) {
				if ($number % $divider == 0)
					return false;
			}
			return true;
		}

		?>
		<p>7</p>
		<p><?= var_export(isSimilar(7)) ?></p>
		<p>8</p>
		<p><?= var_export(isSimilar(8)) ?></p>
	</li>
	<li>
		<p>Дан массив со строками. Запишите в новый массив только те строки, которые начинаются с 'http://'.</p>
		<?
		$array = [
			'Дан массив',
			'со строками',
			'Запишите',
			'в новый массив',
			'только те строки',
			'которые',
			'начинаются с ',
			'http://\'.'
		];
		$new_array = [];
		$begin = 'http://';
		foreach ($array as $str){
			if(substr($str, 0, strlen($begin)) == $begin)
				$new_array[] = $str;
		}
		?>
		<p>[<?= implode(',', $array) ?>]</p>
		<p>[<?= implode(',', $new_array) ?>]</p>
	</li>
</ol>
</body>
</html>