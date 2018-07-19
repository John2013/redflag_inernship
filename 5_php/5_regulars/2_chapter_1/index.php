<?
require "../../base.php";

use Michelf\MarkdownExtra;

echo MarkdownExtra::defaultTransform(file_get_contents('README.md'));
?>

	<h2>Решение</h2>


	<h3>На '.', символы</h3>

	<ol>
		<li><p>Дана строка 'ahb acb aeb aeeb adcb axeb'. Напишите регулярку, которая найдет строки ahb, acb, aeb по
				шаблону: буква 'a', любой символ, буква 'b'.</p>
			<?
			$re = '/a.b/i';
			$str = 'ahb acb aeb aeeb adcb axeb';

			preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

			pprint($re);
			pprint($matches);
			?>
		</li>
		<li><p>Дана строка 'aba aca aea abba adca abea'. Напишите регулярку, которая найдет строки abba adca abea по
				шаблону: буква 'a', 2 любых символа, буква 'a'.</p>
			<?
			$re = '/a.{2}a/i';
			$str = 'aba aca aea abba adca abea';

			preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

			pprint($re);
			pprint($matches);
			?>
		</li>
		<li><p>Дана строка 'aba aca aea abba adca abea'. Напишите регулярку, которая найдет строки abba и abea, не
				захватив adca.</p>
		<?
		$re = '/a[^d][^c]a/i';
		$str = 'aba aca aea abba adca abea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
	</ol>

	<h3>На '+', '*', '?', ()</h3>

	<ol>
		<li><p>Дана строка 'aa aba abba abbba abca abea'. Напишите регулярку, которая найдет строки aba, abba, abbba по
				шаблону: буква 'a', буква 'b' любое количество раз, буква 'a'.</p>
		<?
		$re = '/ab+a/i';
		$str = 'aa aba abba abbba abca abea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка 'aa aba abba abbba abca abea'. Напишите регулярку, которая найдет строки aa, aba, abba, abbba
				по шаблону: буква 'a', буква 'b' любое количество раз (в том числе ниодного раза), буква 'a'.</p>
		<?
		$re = '/ab*a/i';
		$str = 'aa aba abba abbba abca abea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка 'aa aba abba abbba abca abea'. Напишите регулярку, которая найдет строки aa, aba по шаблону:
				буква 'a', буква 'b' один раз или ниодного, буква 'a'.</p>
		<?
		$re = '/ab?a/i';
		$str = 'aa aba abba abbba abca abea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка 'ab abab abab abababab abea'. Напишите регулярку, которая найдет строки по шаблону: строка
				'ab' повторяется 1 или более раз.</p>
		<?
		$re = '/(?:ab)+/i';
		$str = 'ab abab abab abababab abea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
	</ol>

	<h3>На экранировку</h3>

	<ol>
		<li><p>Дана строка 'a.a aba aea'. Напишите регулярку, которая найдет строку a.a, не захватив остальные.</p>
		<?
		$re = '/a\.a/i';
		$str = 'a.a aba aea';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка '2+3 223 2223'. Напишите регулярку, которая найдет строку 2+3, не захватив остальные.</p>
		<?
		$re = '/2\+3/';
		$str = '2+3 223 2223';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка '23 2+3 2++3 2+++3 345 567'. Напишите регулярку, которая найдет строки 2+3, 2++3, 2+++3, не
				захватив остальные (+ может быть любое количество).</p>
		<?
		$re = '/2[\+]+3/';
		$str = '23 2+3 2++3 2+++3 345 567';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка '23 2+3 2++3 2+++3 445 677'. Напишите регулярку, которая найдет строки 23, 2+3, 2++3, 2+++3,
				не захватив остальные.</p>
		<?
		$re = '/2[\+]*3/';
		$str = '23 2+3 2++3 2+++3 345 567';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка '*+ *q+ *qq+ *qqq+ *qqq qqq+'. Напишите регулярку, которая найдет строки *q+, *qq+, *qqq+, не
				захватив остальные.</p>
		<?
		$re = '/[\*]q+[\+]/';
		$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
		</li>
		<li><p>Дана строка '*+ *q+ *qq+ *qqq+ *qqq qqq+'. Напишите регулярку, которая найдет строки *+, *q+, *qq+,
				*qqq+, не захватив остальные.</p>
		<?
		$re = '/[\*]q*[\+]/';
		$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		// Print the entire match result
		pprint($re);
		pprint($matches);
		?>
		</li>
	</ol>

	<h3>На жадность</h3>

	<ol>
		<li>
			<p>Дана строка 'aba accca azzza wwwwa'. Напишите регулярку, которая найдет все строки по краям которых стоят
				буквы 'a', и заменит каждую из них на '!'. Между буквами a может быть любой символ (кроме a).</p>
			<?
			$re = '/a[^a]+?a/';
			$str = 'aba accca azzza wwwwa';

			$result = preg_replace($re, '!', $str);

			pprint($re);
			pprint($result);
			?>
		</li>
	</ol>
<?
