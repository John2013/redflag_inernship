<?
require "../../base.php";

use Michelf\MarkdownExtra;

echo MarkdownExtra::defaultTransform(file_get_contents('README.md'));
?>

<h2>Решение</h2>

<h3>На позитивный и негативный просмотр</h3>

<ol>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите все строки по шаблону буква b, затем 3 буквы a и
			поменяйте 3 буквы a на знак '!'. То есть из 'baaa' нужно сделать 'b!'.
		</p>
		<?
		$re = '/(?<=b)a{3}/';
		$str = 'baaa';

//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите все строки по шаблону любая буква, но не b, затем 3
			буквы a и поменяйте 3 буквы a на знак '!'. То есть из, к примеру, 'waaa' нужно сделать 'w!', а 'baaa' не
			поменяется.
		</p>
		<?
		$re = '/(?<!b)a{3}/';
		$str = 'baaa waaa';

//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите все строки по шаблону 3 буквы a, затем буква b и
			поменяйте 3 буквы a на знак '!'. То есть из 'aaab' нужно сделать '!b'.
		</p>
		<?
		$re = '/a{3}(?=b)/';
		$str = 'aaab aaaw aab';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите все строки по шаблону 3 буквы a, затем любая буква, но
			не b и поменяйте 3 буквы a на знак '!'. То есть из, к примеру, 'aaaw' нужно сделать '!w', а 'aaab' не
			поменяется.
		</p>
		<?
		$re = '/aaa(?!b)/';
		$str = 'aaab aaaw aab';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			Дана строка со звездочками 'aaa * bbb ** eee * **'. Замените на '!' только одиночные звездочки, но не
			двойные.
		</p>
		<?
		$re = '/(?<!\*)\*(?!\*)/';
		$str = 'aaa * bbb ** eee * **';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			Дана строка со звездочками 'aaa * bbb ** eee *** kkk ****'. Замените на '!' только двойные звездочки, но не
			одиночные или тройные и более.
		</p>
		<?
		$re = '/(?<!\*)\*{2}(?!\*)/';
		$str = 'aaa * bbb ** eee *** kkk ****';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите две одинаковые идущие подряд буквы и первую поменяйте
			на '!'.
		</p>
		<?
		$re = '/([a-z])(?=\1)/';
		$str = 'aa ab bb ac bc';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			С помощью позитивного и негативного просмотра найдите две одинаковые идущие подряд буквы и вторую поменяйте
			на '!'.
		</p>
		<?
		$re = '/(?<=([a-z]))\1/';
		$str = 'aa ab bb ac bc';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace($re, '!', $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
</ol>

<h3>На preg_replace_callback</h3>

<ol>
	<li>
		<p>
			Дана строка с целыми числами. С помощью регулярки преобразуйте строку так, чтобы вместо этих чисел стояли их
			квадраты.
		</p>
		<?
		$re = '/\d+/';
		$str = '42 758 44 1 0 5';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace_callback($re,function ($matches){return $matches[0] ** 2;}, $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
	<li>
		<p>
			Дана строка с целыми числами. Найдите числа, стоящие в кавычках и увеличьте их в два раза. Пример: из строки
			2aaa'3'bbb'4' сделаем строку 2aaa'6'bbb'8'.
		</p>
		<?
		$re = '/(?<=\\\')\d+(?=\\\')/';
		$str = '2aaa\'3\'bbb\'4\'';

		//		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
		$result = preg_replace_callback($re,function ($matches){return $matches[0] * 2;}, $str);

		pprint($str);
		echo "<p>".htmlspecialchars($re)."</p>";
		pprint($result);
		?>
	</li>
</ol>