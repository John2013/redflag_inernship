<?
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$dbconn = pg_connect("host=localhost dbname=evgen user=pgusr password=qOr4uLN8yR")
or die('Could not connect: ' . pg_last_error());

function pprint($mixed)
{
	echo "<pre>";
	var_dump($mixed);
	echo "</pre>";
}

function days_to_time($time, $cur_time = null)
{
	if (!$cur_time) {
		$cur_time = time();
	}
	$seconds_to_time = $time - $cur_time;
	$seconds_in_year = 86400;
	return (int)ceil($seconds_to_time / $seconds_in_year);
}

function counter($array)
{
	$counter = [];
	foreach ($array as $item) {
		if (isset($counter[$item]))
			$counter[$item] += 1;
		else $counter[$item] = 1;
	}
	return $counter;
}

function get_percent_array($counter, $all_count, $numbers_after_dot = 2)
{
//	define('ALL_COUNT', $all_count);
//	define('NUMBER_AFTER_DOT', $numbers_after_dot);
//	return array_map(
//		function ($count) {
//			return round($count / ALL_COUNT * 100, NUMBER_AFTER_DOT);
//		},
//		$counter
//	);

	$percent_array = [];
	foreach ($counter as $count){
		$percent_array[] = round($count / $all_count * 100, $numbers_after_dot);
	}
	return $percent_array;
}

function mb_str_to_array($string, $encoding = 'UTF-8')
{
	$strlen = mb_strlen($string);
	$array = [];
	while ($strlen) {
		$array[] = mb_substr($string, 0, 1, $encoding);
		$string = mb_substr($string, 1, $strlen, $encoding);
		$strlen = mb_strlen($string, $encoding);
	}
	return $array;
}

class MyTransliterator
{
	const ALPHABET = [
		'а' => 'a',
		'б' => 'b',
		'в' => 'v',
		'г' => 'g',
		'д' => 'd',
		'е' => 'e',
		'ё' => 'yo',
		'ж' => 'zh',
		'з' => 'z',
		'и' => 'i',
		'й' => 'j',
		'к' => 'k',
		'л' => 'l',
		'м' => 'm',
		'н' => 'n',
		'о' => 'o',
		'п' => 'p',
		'р' => 'r',
		'с' => 's',
		'т' => 't',
		'у' => 'u',
		'ф' => 'f',
		'х' => 'h',
		'ц' => 'c',
		'ч' => 'ch',
		'ш' => 'sh',
		'щ' => 'shch',
		'ъ' => '\'',
		'ы' => 'i',
		'ь' => '\'',
		'э' => 'e',
		'ю' => 'yu',
		'я' => 'ya',
	];

	public static function transliterate($string)
	{
		$chars = mb_str_to_array($string);
		$translited = '';
		foreach ($chars as $index => $char) {
			$translited .= self::ALPHABET[$char] ?: $char;
		}
		return $translited;
	}

	public static function transliterate_back($string)
	{
		$alphabet = self::ALPHABET;
		unset($alphabet['ъ']);
		unset($alphabet['э']);
		unset($alphabet['ы']);
		$alphabet = array_flip($alphabet);
		$chars = mb_str_to_array($string);
		$skip = 0;
		$translited = '';
		foreach ($chars as $index => $char) {
			if ($char == 'c' && $chars[$index + 1] == 'h') {
				$skip = 2;
				$translited .= 'ч';
			}
			if ($char == 's' && $chars[$index + 1] == 'h' && $chars[$index + 2] != 'c' && $chars[$index + 3] != 'h') {
				$skip = 2;
				$translited .= 'ш';
			}
			if ($char == 's' && $chars[$index + 1] == 'h' && $chars[$index + 2] == 'c' && $chars[$index + 3] == 'h') {
				$skip = 4;
				$translited .= 'щ';
			}
			if ($char == 'y' && $chars[$index + 1] == 'o') {
				$skip = 2;
				$translited .= 'ё';
			}
			if ($char == 'y' && $chars[$index + 1] == 'u') {
				$skip = 2;
				$translited .= 'ю';
			}
			if ($char == 'y' && $chars[$index + 1] == 'a') {
				$skip = 2;
				$translited .= 'я';
			}
			if ($skip > 0) {
				$skip -= 1;
				continue;
			}
			if (isset($alphabet[$char]))
				$translited .= $alphabet[$char];
			else $translited .= $char;
		}
		return $translited;
	}
}

class Question
{
	public $text;
	protected $variants = [];
	private $truth_number = 0;

	/**
	 * Question constructor.
	 * @param string $text
	 * @param string[] $variants list of answers
	 * @param int $truth_number number of truth answer from 0
	 */
	function __construct($text = '', $variants, $truth_number = 0)
	{
		$this->text = $text;
		$this->variants = $variants;
		$this->truth_number = $truth_number;
	}

	function __toString()
	{
		return $this->text;
	}

	function get_variants()
	{
		return $this->variants;
	}

	function string_variant_is_true($string)
	{
		return $this->variants[$this->truth_number] == $string;
	}

	function get_variant($variant_number)
	{
		return [
			'number' => $variant_number,
			'text' => $this->variants[$variant_number],
			'truth' => $this->truth_number == $variant_number
		];
	}
}

class MultipleAnswerQuestion extends Question
{
	private $truth_numbers = [];

	/**
	 * MultipleAnswerQuestion constructor.
	 * @param string $text
	 * @param string[] $variants list of answers
	 * @param int[] $truth_numbers numbers of truth answer from 0
	 */
	function __construct($text = '', $variants, $truth_numbers = [0])
	{
		parent::__construct($text = '', $variants);

		$this->truth_numbers = $truth_numbers;
	}

	function variants_is_true($variants_numbers)
	{
		foreach ($variants_numbers as $v_number) {
			if (in_array($v_number, $this->truth_numbers))
				return true;
		}

		return false;
	}

	function get_variant($variant_number)
	{
		return [
			'number' => $variant_number,
			'text' => $this->variants[$variant_number],
			'truth' => in_array($variant_number, $this->truth_numbers)
		];
	}
}

function get_html_tr($row){
	$html = "<tr>";
	foreach ($row as $value){
		$html .= "<td>$value</td>";
	}
	return  $html . "</tr>";
}

function get_html_table($array, $filter_str = ''): string {
	$html = "<table>$filter_str<tr>";
	foreach ($array[0] as $col_name => $value){
		$html .= "<th>$col_name</th>";
	}
	$html .= "</tr>";
	foreach ($array as $row){
		$html .= get_html_tr($row);
	}
	return $html . "</table>";
}