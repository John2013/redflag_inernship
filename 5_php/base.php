<?
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

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
	define('ALL_COUNT', $all_count);
	define('NUMBER_AFTER_DOT', $numbers_after_dot);

	return array_map(
		function ($count) {
			return round($count / ALL_COUNT * 100, NUMBER_AFTER_DOT);
		},
		$counter
	);
}

class MyTransliterator{
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
		'х' => 'k',
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

	public static function transliterate($string){
		$chars = mb_split('//u', $string);
		var_dump($chars);
		$translited = '';
		foreach ($chars as $index => $char){
			$translited .= self::ALPHABET[$char] ?: $char ;
		}
		return $translited;
	}

	public static function transliterate_back($string){
		$alphabet = self::ALPHABET;
		unset($alphabet['ъ']);
		unset($alphabet['э']);
		unset($alphabet['ы']);
		$alphabet = array_flip($alphabet);
		$chars = str_split($string);
		$skip = 0;
		$translited = '';
		foreach ($chars as $index => $char){
			if($char == 'c' && $chars[$index + 1] == 'h'){
				$skip = 2;
				$translited .= 'ч';
			}
			if($char == 's' && $chars[$index + 1] == 'h' && $chars[$index + 2] != 'c' && $chars[$index + 3] != 'h'){
				$skip = 2;
				$translited .= 'ш';
			}
			if($char == 's' && $chars[$index + 1] == 'h' && $chars[$index + 2] == 'c' && $chars[$index + 3] == 'h'){
				$skip = 4;
				$translited .= 'щ';
			}
			if($char == 'y' && $chars[$index + 1] == 'o'){
				$skip = 2;
				$translited .= 'ё';
			}
			if($char == 'y' && $chars[$index + 1] == 'u'){
				$skip = 2;
				$translited .= 'ю';
			}
			if($char == 'y' && $chars[$index + 1] == 'a'){
				$skip = 2;
				$translited .= 'я';
			}
			if($skip > 0){
				$skip -= 1;
				continue;
			}
			if(isset($alphabet[$char]))
				$translited .= $alphabet[$char];
			else $translited .= $char;
		}
		return $translited;
	}
}