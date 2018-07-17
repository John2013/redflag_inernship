<?
require "../../base.php";

use Michelf\MarkdownExtra;

echo MarkdownExtra::defaultTransform(file_get_contents('README.md'));
?>
<h2>Решение</h2>

<h3>На <code>{}</code></h3>

<ol>
	<li><p>Дана строка <code>aa aba abba abbba abbbba abbbbba</code>. Напишите регулярку, которая найдет строки abba,
			abbba, abbbba и только их.</p>
	<?
	$re = '/ab{2,4}a/';
	$str = 'aba abba abbba abbbba abbbbba';

	preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

	pprint($re);
	pprint($matches);
	?>
	</li>
	<li><p>Дана строка <code>aa aba abba abbba abbbba abbbbba</code>. Напишите регулярку, которая найдет строки вида
			aba, в которых <code>b</code> встречается менее 3-х раз (включительно).</p>
	<?
	$re = '/ab{3,}a/';
	$str = 'aa aba abba abbba abbbba abbbbba';

	preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

	pprint($re);
	pprint($matches);
	?>
	</li>
	<li><p>Дана строка <code>aa aba abba abbba abbbba abbbbba</code>. Напишите регулярку, которая найдет строки вида
			aba, в которых <code>b</code> встречается более 4-х раз (включительно).</p>
		<?
		$re = '/ab{5,}a/';
		$str = 'aa aba abba abbba abbbba abbbbba';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На <code>\s</code>, <code>\S</code>, <code>\w</code>, <code>\W</code>, <code>\d</code>, <code>\D</code></h3>

<ol>
	<li><p>Дана строка <code>a1a a2a a3a a4a a5a aba aca</code>. Напишите регулярку, которая найдет строки, в которых по
			краям стоят буквы <code>a</code>, а между ними одна цифра.</p>
	<?
	$re = '/a\da/';
	$str = 'a1a a2a a3a a4a a5a aba aca';

	preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

	pprint($re);
	pprint($matches);
	?>
	</li>
	<li><p>Дана строка <code>a1a a22a a333a a4444a a55555a aba aca</code>. Напишите регулярку, которая найдет строки, в
			которых по краям стоят буквы <code>a</code>, а между ними любое количество цифр.</p>
		<?
		$re = '/a\d+?a/';
		$str = 'a1a a22a a333a a4444a a55555a aba aca';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Дана строка <code>aa a1a a22a a333a a4444a a55555a aba aca</code>. Напишите регулярку, которая найдет строки,
			в которых по краям стоят буквы <code>a</code>, а между ними любое количество цифр (в том числе и ноль цифр,
			то есть строка <code>aa</code>).</p>
		<?
		$re = '/a\d*?a/';
		$str = 'aa a1a a22a a333a a4444a a55555a aba aca';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Дана строка <code>avb a1b a2b a3b a4b a5b abb acb</code>. Напишите регулярку, которая найдет строки
			следующего вида: по краям стоят буквы <code>a</code> и <code>b</code>, а между ними - не число.</p>
		<?
		$re = '/a\Db/';
		$str = 'avb a1b a2b a3b a4b a5b abb acb';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Дана строка <code>ave a#b a2b a$b a4b a5b a-b acb</code>. Напишите регулярку, которая найдет строки
			следующего вида: по краям стоят буквы <code>a</code> и <code>b</code>, а между ними - не буква и не цифра.
		</p>
		<?
		$re = '/a[\D\W]b/';
		$str = 'ave a#b a2b a$b a4b a5b a-b acb';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Дана строка <code>ave a#a a2a a$a a4a a5a a-a aca</code>. Напишите регулярку, которая заменит все пробелы на
			<code>!</code>.</p>
		<?
		$re = '/\s/';
		$str = 'ave a#a a2a a$a a4a a5a a-a aca';

		$result = preg_replace($re, '!', $str);

		pprint($re);
		pprint($result);
		?></li>
</ol>

<h3>На [], <code>^</code> - не, [a-zA-Z], кириллицу</h3>

<ol>
	<li><p>Дана строка <code>aba aea aca aza axa</code>. Напишите регулярку, которая найдет строки <code>aba</code>,
			<code>aea</code>, <code>axa</code>, не затронув остальных.</p>
		<?
		$re = '/a[bex]a/';
		$str = 'aba aea aca aza axa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Дана строка <code>aba aea aca aza axa a.a a+a a*a</code>. Напишите регулярку, которая найдет строки
			<code>aba</code>, <code>a.a</code>, <code>a+a</code>, <code>a*a</code>, не затронув остальных.</p>
		<?
		$re = '/a[b\.\+\*]a/';
		$str = 'aba aea aca aza axa a.a a+a a*a';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы <code>a</code>, а между ними
			- цифра от 3-х до 7-ми.</p>
		<?
		$re = '/a\d{3,7}a/';
		$str = 'a75a aea a12345678a a0a a123a a.a a+a a*a';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?></li>
	<li><p>Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы <code>a</code>, а между ними
			- буква от <code>a</code> до <code>g</code>.</p>
	<? pprint('/a[a-g]a/') ?>
	</li>
	<li><p>Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы <code>a</code>, а между ними
			- буква от <code>a</code> до <code>f</code> и от <code>j</code> до <code>z</code>.</p>
	<? pprint('/a[a-fj-z]a/') ?>
	</li>
	<li><p>Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы <code>a</code>, а между ними
			- буква от <code>a</code> до <code>f</code> и от <code>A</code> до <code>Z</code>.</p>
	<? pprint('/a[a-fA-Z]a/') ?>
	</li>
	<li><p>Дана строка <code>aba aea aca aza axa a-a a#a</code>. Напишите регулярку, которая найдет строки следующего
			вида: по краям стоят буквы <code>a</code>, а между ними - не <code>e</code> и не <code>x</code>.</p>
		<?
		$re = '/a[^ex]a/';
		$str = 'aba aea aca aza axa a-a a#a';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>wйw wяw wёw wqw</code>. Напишите регулярку, которая найдет строки следующего вида: по краям
			стоят буквы <code>w</code>, а между ними - буква кириллицы.</p>
		<?
		$re = '/w[а-яё]w/u';
		$str = 'wйw wяw wёw wqw';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На [a-zA-Z] и квантификаторы</h3>

<ol>
	<li><p>Дана строка <code>aAXa aeffa aGha aza ax23a a3sSa</code>. Напишите регулярку, которая найдет строки
			следующего вида: по краям стоят буквы <code>a</code>, а между ними - маленькие латинские буквы, не затронув
			остальных.</p>
		<?
		$re = '/a[a-z]+a/';
		$str = 'aAXa aeffa aGha aza ax23a a3sSa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>aAXa aeffa aGha aza ax23a a3sSa</code>. Напишите регулярку, которая найдет строки
			следующего вида: по краям стоят буквы <code>a</code>, а между ними - маленькие и большие латинские буквы, не
			затронув остальных.</p>
		<?
		$re = '/a[a-z]+a/i';
		$str = 'aAXa aeffa aGha aza ax23a a3sSa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>aAXa aeffa aGha aza ax23a a3sSa</code>. Напишите регулярку, которая найдет строки
			следующего вида: по краям стоят буквы <code>a</code>, а между ними - маленькие латинские буквы и цифры, не
			затронув остальных.</p>
		<?
		$re = '/a[a-z0-9]+a/';
		$str = 'aAXa aeffa aGha aza ax23a a3sSa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ</code>. Напишите регулярку, которая найдет все
			слова по шаблону: любая кириллическая буква любое количество раз.</p>
		<?
		$re = '/[а-яё]+/ui';
		$str = 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На <code>^</code>, <code>$</code></h3>

<ol>
	<li><p>Дана строка <code>aaa aaa aaa</code>. Напишите регулярку, которая заменит первое <code>aaa</code> на
			<code>!</code>.</p>
		<?
		$re = '/^a+/';
		$str = 'aaa aaa aaa';

		$matches = preg_replace($re, '!', $str);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>aaa aaa aaa</code>. Напишите регулярку, которая заменит последнее <code>aaa</code> на
			<code>!</code>.</p>
		<?
		$re = '/a+$/';
		$str = 'aaa aaa aaa';

		$matches = preg_replace($re, '!', $str);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На <code>|</code></h3>

<ol>
	<li><p>Дана строка <code>aeeea aeea aea axa axxa axxxa</code>. Напишите регулярку, которая найдет строки следующего
			вида: по краям стоят буквы <code>a</code>, а между ними - или буква <code>e</code> любое количество раз или
			по краям стоят буквы <code>a</code>, а между ними - буква <code>x</code> любое количество раз.</p>
		<?
		$re = '/(?:ae+a)|(?:ax+a)/';
		$str = 'aeeea aeea aea axa axxa axxxa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>aeeea aeea aea axa axxa axxxa</code>. Напишите регулярку, которая найдет строки следующего
			вида: по краям стоят буквы <code>a</code>, а между ними - или буква <code>e</code> два раза или буква <code>x</code>
			любое количество раз.</p>
		<?
		$re = '/a(?:(?:e{2})|(?:x+))a/';
		$str = 'aeeea aeea aea axa axxa axxxa';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На \b, \B</h3>

<ol>
	<li>Дана строка <code>xbx aca aea abba adca abea</code>. Напишите регулярку, которая вокруг каждого слова вставит
		<code>!</code> (получится <code>!xbx! !aca! !aea! !abba! !adca! !abea!</code>).
		<?
		$re = '/\b/';
		$str = 'xbx aca aea abba adca abea';

		$matches = preg_replace($re, '!',$str);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На обратный слеш \</h3>

<ol>
	<li><p>Дана строка <code>a\a abc</code>. Напишите регулярку, которая заменит строку <code>a\a</code> на
			<code>!</code>.</p>
		<?
		$re = '/\\\\/';
		$str = 'a\a abc';

		$matches = preg_replace($re, '!',$str);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>a\a a\\a a\\\a</code>. Напишите регулярку, которая заменит строку <code>a\\\a</code> на
			<code>!</code>.</p>
		<?
		$re = '/\\\\{3}/';
		$str = 'a\a a\\\\a a\\\\\\a';

		$matches = preg_replace($re, '!',$str);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На экранировку посложнее</h3>

<ol>
	<li><p>Дана строка <code>bbb /aaa\ bbb /ccc\</code>. Напишите регулярку, которая найдет содержимое всех конструкций
			<code>/...\</code> и заменит их на <code>!</code>.</p>
		<?
		$re = '/\/.+?\\\\/';
		$str = 'bbb /aaa\\ bbb /ccc\\';

		$matches = preg_replace($re, '!',$str);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>bbb &lt;b&gt; hello &lt;/b&gt;, &lt;b&gt; world &lt;/b&gt; eee</code>. Напишите регулярку,
			которая найдет содержимое тегов <code>&lt;b&gt;</code> и заменит их на <code>!</code>.</p>
		<?
		$re = '/(?<=\<b\>).+?(?=\<\/b\>)/';
		$str = 'bbb <b> hello </b>, <b> world </b> eee';

		$matches = preg_replace($re, '!', $str);

		pprint($re);
		pprint(htmlspecialchars($matches));
		?>
	</li>
</ol>
