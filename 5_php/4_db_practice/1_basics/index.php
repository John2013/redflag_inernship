<?
require '../../base.php';

use Michelf\MarkdownExtra;

function map_htmlspecialchars($item)
{
	return htmlspecialchars($item);
}

function table_get_by_id($table_array, $id)
{
	foreach ($table_array as $row)
		if ($row['id'] == $id)
			return $row;

	return false;
}

function table_add_col_link($table_array, $col_title, $get_param_name, $get_param_value_col, $link_title, $div_id = '')
{
	$new_array = [];
	foreach ($table_array as $row) {
		$row[$col_title] = "<a href='./?$get_param_name={$row[$get_param_value_col]}#$div_id'>$link_title</a>";
		$new_array[] = $row;
	}

	return $new_array;
}

if ($_GET['del_id']) {
	pg_delete($dbconn, 'workers', ['id' => (int)$_GET['del_id']]);
}

if ($_REQUEST['db3_submit']) {
	$add_array = array_map("map_htmlspecialchars", $_REQUEST['add']);
	pg_insert($dbconn, 'workers', $add_array);
}

if ($_REQUEST['db4_submit']) {
	$change_array = array_map("map_htmlspecialchars", $_REQUEST['change']);
	$id = (int)$change_array['id'];
	$res = pg_update($dbconn, 'workers', $change_array, ['id' => $id]);
}

$rs = pg_query($dbconn, 'SELECT * FROM workers');
$table_array = pg_fetch_all($rs);

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
<ol>
	<li>
		<p>Дана таблица с работниками. Реализуйте ее вывод на экран</p>
		<?
		echo get_html_table($table_array)
		?>
	</li>
	<li>
		<p>Сделайте в таблице всех работников ссылку 'удалить'. По нажатию на эту ссылку из БД должна удаляться запись с
			этим id (его следует передавать через GET-параметр del_id).</p>
		<?
		$table_array_2 = table_add_col_link($table_array, 'удаление', 'del_id',
			'id', 'удалить');
		echo get_html_table($table_array_2);
		?>
	</li>
	<li id="db3">
		<p>Сделайте форму добавления нового работника.</p>
		<form action="#db3" method="post">
			<div>
				<input type="text" id="name" name="add[name]" value="<?= $_REQUEST['add']['name'] ?>">
				<label for="name">name</label>
			</div>
			<div>
				<input type="text" id="age" name="add[age]" value="<?= $_REQUEST['add']['age'] ?>">
				<label for="age">age</label>
			</div>
			<div>
				<input type="text" id="salary" name="add[salary]" value="<?= $_REQUEST['add']['salary'] ?>">
				<label for="salary">salary</label>
			</div>
			<input type="submit" name="db3_submit">
		</form>
	</li>
	<li id="db4">
		<p>Сделайте колонку 'редактировать' для каждого работника. Там должна быть ссылка, по переходу на которую
			появится страница с формой редактирования работника.</p>
		<?
		$table_array_3 = table_add_col_link($table_array, 'редактирование', 'change_id',
			'id', 'редактировать', 'db4');

		echo get_html_table($table_array_3);

		if ($_REQUEST['change_id']) {
			$id = (int)$_REQUEST['change_id'];
			?>
			<form action="#db4">
				<input type="hidden" name="change[id]" value="<?= $id ?>">
				<div>
					<input type="text" id="name" name="change[name]"
					       value="<?= table_get_by_id($table_array, $id)['name'] ?>">
					<label for="name">name</label>
				</div>
				<div>
					<input type="text" id="age" name="change[age]"
					       value="<?= table_get_by_id($table_array, $id)['age'] ?>">
					<label for="age">age</label>
				</div>
				<div>
					<input type="text" id="salary" name="change[salary]"
					       value="<?= table_get_by_id($table_array, $id)['salary'] ?>">
					<label for="salary">salary</label>
				</div>
				<input type="submit" name="db4_submit">
			</form>
			<?
		}
		?>
	</li>
	<li>
		<p>Над таблицей с работниками сделайте инпут, в который вводится зарплата. По нажатию на кнопку следует вывести
			таблицу работников с введенной зарплатой.</p>
	</li>
	<li></li>
	<li></li>
</ol>
</body>
</html>