# Задачи на продвинутую работу с формами в PHP

## Примеры решения задач

**Задача**. Сделайте чекбокс: если он отмечен, то выведите 'отмечен', если не отмечен - то выведите 'не отмечен'.

**Решение**:

```php
<form action="" method="GET">
	<input type="hidden" name="hello" value="0">
	<input type="checkbox" name="hello" value="1">
	<input type="submit">
</form>

<?php
	if (isset($_REQUEST['hello']) and $_REQUEST['hello'] == 0) {
		echo 'не отмечен';
	}

	if (isset($_REQUEST['hello']) and $_REQUEST['hello'] == 1) {
		echo 'отмечен';
	}
?>
```

**Задача**. Сделайте функцию input, которая создает инпут с типом text. Функция должна иметь следующие параметры: name, value.

Пример работы такой функции:

```
<?php
	echo input('age', 25); //выведет <input type="text" name="age" value="25">
?>
```
**Решение**:

```
<?php
	function input($name, $value)
	{
		return '<input type="text" name="'.$name.'" value="'.$value.'">';
	}
?>
```

**Задача**. Модифицируйте функцию из предыдущей задачи так, чтобы она сохраняла значение инпута после отправки.

**Решение**:

```
<?php
	function input($name, $value)
	{
		if(isset($_REQUEST[$name])) {
			$value = $_REQUEST[$name];
		}

		return '<input type="text" name="'.$name.'" value="'.$value.'">';
	}
?>
```
Как это работает: если форма была отправлена и существует $_REQUEST[имя нашего инпута], то в переменную $value записываем содержимое из $_REQUEST.

В противном случае переменная $value не меняется и остается такой, какой была задана при вызове функции.

## Задачи для решения
### Работа с checkbox
1.  Спросите у пользователя имя с помощью формы. Сделайте чекбокс: если он отмечен, то поприветствуйте пользователя, если не отмечен - попрощайтесь с пользователем.

1.  Спросите у пользователя, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.

### Работа с radio переключателями
1.  Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок. Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен.

1.  Спросите у пользователя его возраст с помощью нескольких radio-кнопок. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.

### Select и multi-select
1.  Спросите у пользователя его возраст с помощью select. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.

1.  Спросите у пользователя с помощью мультиселекта, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.

### Задачи
1.  Сделайте функцию, которая создает обычный текстовый инпут. Функция должна иметь следующие параметры: type, name, value.

1.  Модифицируйте функцию из предыдущей задачи так, чтобы она сохраняла значение инпута после отправки.

1.  Сделайте функцию, которая создает чекбокс. Если чекбокс не отмечен - функция должна отправлять 0 (то есть нужно сделать hidden инпут), если отмечен - 1.

1.  Напишите функцию, которая создает чекбокс и сохраняет его значение после отправки.