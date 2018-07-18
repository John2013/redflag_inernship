<?
require "../../base.php";

use Michelf\MarkdownExtra;

echo MarkdownExtra::defaultTransform(file_get_contents('README.md'));
?>
<h2>Решение</h2>

<h3>На карманы при замене</h3>

<ol>
	<li><p>Дана строка <code>aaa@bbb eee7@kkk</code>. Напишите регулярку, которая найдет строки по шаблону: любое
			количество букв и цифр, символ <code>@</code>, любое количество букв и цифр и поменяет местами то, что стоит
			до <code>@</code> на то, что стоит после нее. Например, <code>aaa@bbb</code> должно превратиться в <code>bbb@aaa</code>.
		</p>
		<?
		$re = '/(\S+)@(\S+)/';
		$str = 'aaa@bbb eee7@kkk';

		$matches = preg_replace($re, '$2@$1', $str);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка вида <code>a1b2c3</code>. Напишите регулярку, которая найдет все цифры и удвоит их количество
			таким образом: <code>a11b22c33</code> (то есть рядом с каждой цифрой напишет такую же).</p>
		<?
		$re = '/(.(\d))/';
		$str = 'a1b2c3';

		$matches = preg_replace($re, '$1$2', $str);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>На карманы в самой регулярке</h3>

<ol>
	<li><p>Дана строка <code>aae xxz 33a</code>. Найдите все места, где есть два одинаковых идущих подряд символа и
			замените их на <code>!</code>.</p>
		<?
		$re = '/(\w)\1/';
		$str = 'aae xxz 33a';

		$matches = preg_replace($re, '!', $str);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>Дана строка <code>aaa bcd xxx efg</code>. Найдите строки, состоящие из одинаковых символов (это будет aaa
			xxx).</p>
		<?
		$re = '/(\w)\1{2}/';
		$str = 'aaa bcd xxx efg';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		?>
	</li>
</ol>

<h3>Задачи на <code>preg_match[_all]</code></h3>

<p>Задачи ниже не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP
	(не всегда, но такое может быть).</p>

<ol>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является емэйлом. Примеры емэйлов для
			тестирования mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by,
			mail@yandex.ru.</p>
		<?
		$emails = [
			'mymail@mail.ru',
			'my.mail@mail.ru',
			'my-mail@mail.ru',
			'my_mail@mail.ru',
			'mail@mail.com',
			'mail@mail.by',
			'.@.ru'
		];
		pprint($emails);
		define(
			'EMAIL_RE',
			'/\b(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?' .
			'\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F' .
			'\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))' .
			'(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-' .
			'\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+' .
			'(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:' .
			'(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::' .
			'[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::' .
			'[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]' .
			'{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.' .
			'(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))\b/iD'
		);
		pprint(EMAIL_RE);
		$is_email_array = array_map(function ($email) {
			return (bool)preg_match(EMAIL_RE, $email);
		}, $emails);
		pprint($is_email_array);
		?>
	</li>
	<li><p>Дана строка с текстом, в котором могут быть емейлы. С помощью preg_match_all найдите все емэйлы.</p>
		<?
		$str = implode(" ", $emails);

		preg_match_all(EMAIL_RE, $str, $matches, PREG_SET_ORDER);

		pprint($str);
		pprint($matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является доменом. Примеры доменов: <code>site.ru</code>,
			<code>site.com</code>, <code>my-site123.com</code>.</p>
		<?
		$re = '/[-a-z\d]+\.[a-z]{2,}/';
		$str = 'my-site123.com';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		pprint($re);
		pprint($matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является доменом 3-го уровня. Примеры
			доменов: <code>hello.site.ru</code>, <code>hello.site.com</code>, <code>hello.my-site.com</code>.</p>
		<?
		$re = '/[-a-z\d]+\.[-a-z\d]+\.[a-z]{2,}/';
		$str = 'hello.my-site.com';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является доменом, название которого
			начинается с <code>http</code>. Примеры доменов: <code>http://site.ru</code>, <code>http://site.com</code>.
		</p>
		<?
		$re = '/http:\/\/[-a-z\d]+\.[a-z]{2,}/';
		$str = 'http://site.com';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является доменом вида <code>http://site.ru</code>.
			Протокол может быть как <code>http</code>, так и <code>https</code>.</p>
		<?
		$re = '/https?:\/\/[-a-z\d]+\.[a-z]{2,}/';
		$str = 'http://site.ru';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка является доменом. Протокол может быть как
			<code>http</code>, так и <code>https</code>. Домен может быть со слешем в конце: <code>http://site.ru</code>,
			<code>http://site.ru/</code>, <code>https://site.ru</code>, <code>https://site.ru/</code>.</p>
		<?
		$re = '/https?:\/\/[-a-z\d]+\.[a-z]{2,}\/?/';
		$str = 'http://site.ru';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?>
	</li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка начинается с <code>http</code> или с
			<code>https</code>.</p>
		<?
		$re = '/^https?:\/\//';
		$str = 'http://site.ru';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?></li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка заканчивается расширением
			<code>txt</code>, <code>html</code> или <code>php</code>.</p>
		<?
		$re = '/\.(?:(?:txt)|(?:html)|(?:php))$/';
		$str = 'test.txt';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?></li>
	<li><p>С помощью <code>preg_match</code> определите, что переданная строка заканчивается расширением
			<code>jpg</code> или <code>jpeg</code>.</p>
		<?
		$re = '/\.jpe?g$/';
		$str = 'test.jpg';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?></li>
	<li><p>С помощью <code>preg_match</code> узнайте является ли строка числом, длиной до 12 цифр.</p>
		<?
		$re = '/^.{0,12}$/';
		$str = 'test.jpg';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		pprint($re);
		pprint($matches);
		pprint((bool)$matches);
		?></li>
	<li><p>Дана строка с буквами, пробелами и цифрами. Найдите сумму всех чисел из данной строки.</p>
		<?
		$re = '/\d+/';
		$str = 'ff4few 9f4we9 f465c165s156a sc65ac468 a4c';

		preg_match_all($re, $str, $matches, PREG_SET_ORDER);

		$matches = array_map(function ($array){return (int)$array[0];}, $matches);
		pprint($str);
		pprint($re);
		pprint($matches);
		pprint(array_sum($matches));
		?></li>
</ol>

<h3>Задачи на preg_replace</h3>

<ol>
	<li><p>С помощью <code>preg_replace</code> преобразуйте дату в формате <code>31-12-2014</code> в
			<code>2014.12.31</code>.</p>
		<?
		$re = '/^(\d{2})-(\d{2})-(\d{4})$/';
		$str = '31-12-2014';
		$day = 1; $month = 2; $year = 3;

		$result = preg_replace($re, "$$year.$$month.$$day", $str);

		pprint($re);
		pprint($result);
		?>
	</li>
	<li><p>С помощью <code>preg_replace</code> замените в строке домены вида <code>http://site.ru</code>, <code>http://site.com</code>
			на <code>&lt;a href="http://site.ru"&gt;site.ru&lt;/a&gt;</code>.</p>
		<?
		$re = '/^(https?:\/\/([a-z\d]+\.[a-z]{2,}\/?))$/';
		$str = 'http://site.ru';

		$result = preg_replace($re, '<a href="$1">$2</a>', $str);

		pprint($re);
		pprint($result);
		?>
	</li>
</ol>
