<?
require '../../base.php';

use Michelf\MarkdownExtra;

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

function table_add_col_checkbox($table_array, $col_title, $get_param_name, $get_param_value_col, $checkbox_title,
                                $form_id, $checked_array = [])
{
	$new_array = [];
	foreach ($table_array as $r_number => $row) {
		$name = $get_param_name . "[" . $row[$get_param_value_col] . "]";
		$is_checked = $checked_array[$row[$get_param_value_col]] ? " checked" : "";
		$row[$col_title] = "<input type='checkbox' name='$name' title='$checkbox_title' form='$form_id'$is_checked>";
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

if($_REQUEST['db6_del']) {
	$delete_array = [];
	foreach ($_REQUEST['db6_del'] as $id => $_){
		$delete_array[] = (int)$id;
	}
	$id_list = implode(', ', $delete_array);
	$query = "DELETE FROM workers WHERE id in ($id_list)";
	pprint($query);
	pg_query($dbconn, $query);
}

$rs = pg_query($dbconn, 'SELECT * FROM workers');
$table_array = pg_fetch_all($rs);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script>
		function filter_keypress(e) {
			if (e.charCode === 13)
				e.target.form.submit()
		}
	</script>
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
				<input type="number" id="age" name="add[age]" value="<?= $_REQUEST['add']['age'] ?>">
				<label for="age">age</label>
			</div>
			<div>
				<input type="number" id="salary" name="add[salary]" step="100"
				       value="<?= $_REQUEST['add']['salary'] ?>">
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
			<form action="#db4" method="post">
				<input type="hidden" name="change[id]" value="<?= $id ?>">
				<div>
					<input type="text" id="name" name="change[name]"
					       value="<?= table_get_by_id($table_array, $id)['name'] ?>">
					<label for="name">name</label>
				</div>
				<div>
					<input type="number" id="age" name="change[age]"
					       value="<?= table_get_by_id($table_array, $id)['age'] ?>">
					<label for="age">age</label>
				</div>
				<div>
					<input type="number" id="salary" name="change[salary]" step="100"
					       value="<?= table_get_by_id($table_array, $id)['salary'] ?>">
					<label for="salary">salary</label>
				</div>
				<input type="submit" name="db4_submit">
			</form>
			<?
		}
		?>
	</li>
	<li id="db5">
		<p>Над таблицей с работниками сделайте инпут, в который вводится зарплата. По нажатию на кнопку следует вывести
			таблицу работников с введенной зарплатой.</p>
		<form action="./#db5" id="filter_form"></form>
		<?
		$filter = array_map("map_htmlspecialchars", $_REQUEST['filter']);
		foreach ($filter as $key => $item) {
			if (!$item)
				unset($filter[$key]);
		}
		$filter_row = "<tr>
<td></td>
<td><input type='text' name='filter[name]' form='filter_form' value='{$filter['name']}' 
onkeypress='return filter_keypress(event)'></td>
<td><input type='number' name='filter[age]' form='filter_form' value='{$filter['age']}' 
onkeypress='return filter_keypress(event)'></td>
<td><input type='number' name='filter[salary]' form='filter_form' value='{$filter['salary']}' step='100' 
onkeypress='return filter_keypress(event)'></td>
</tr>";

		$table_array5 = $filter
			? pg_select($dbconn, 'workers', $filter)
			: $table_array;

		echo get_html_table($table_array5, $filter_row);
		?>
	</li>
	<li id="db6">
		<p>Сделайте колонку 'удалить', в которой для каждого работника будет стоять чекбокс. Под таблицей сделайте
			кнопку, по нажатию на которую будут удалены те работники, для которых чекбокс был отмечен.</p>
		<form action="./#db6" method="post" id="db6_form"></form>
		<?
		$delete_array = array_map("map_htmlspecialchars", $_REQUEST['db6_del']);

		$table_array6 = table_add_col_checkbox($table_array,'удалить', 'db6_del',
			'id', 'удалить', 'db6_form', $delete_array);

		echo get_html_table($table_array6);


		?>
		<input type="submit" value="удалить" form="db6_form">
	</li>
</ol>
</body>
</html>