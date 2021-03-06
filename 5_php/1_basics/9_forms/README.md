# Задачи на формы в PHP

## Примеры решения задач

**Задача**. Спросите город пользователя с помощью формы. Результат запишите в переменную $city. 
Выведите на экран фразу 'Ваш город: %Город%'.

**Решение**:

```php
<form action="" method="GET">
	<input type="text" name="city">
	<input type="submit">
</form>

<?php
	//Если форма была отправлена и город не пустой:
	if (!empty($_REQUEST['city'])) {
		$city = $_REQUEST['city'];
		echo 'Ваш город: '.$city;
	}
?>
```
### Запрет ввода тегов
Решим предыдущую задачу так, чтобы пользователь не мог вводить теги и сломать нам сайт. Для этого при записи содержимого поля в переменную $city обработаем его (содержимое, то есть $_REQUEST['city']) функцией strip_tags, которая удалит теги (можно вместо нее обработать функцией htmlspecialchars):

```php
<form action="" method="GET">
	<input type="text" name="city">
	<input type="submit">
</form>

<?php
	//Если форма была отправлена и город не пустой:
	if (isset($_REQUEST['city'])) {
		$city = strip_tags($_REQUEST['city']);
		echo 'Ваш город: '.$city;
	}
?>
```
### Скрываем форму после отправки
Давайте сделаем так, чтобы форма после отправки скрывалась:

```php
<?php
	//Если город пустой - покажем форму
	if (isset($_REQUEST['city'])) {
?>
		<form action="" method="GET">
			<input type="text" name="name">
			<input type="submit">
		</form>
<?php
	}
?>

<?php
	//Если форма была отправлена и город не пустой:
	if (isset($_REQUEST['city'])) {
		$city = strip_tags($_REQUEST['age']);
		echo 'Ваш город: '.$age;
	}
?>
```
## Задачи для решения
### Формы
1.  Спросите имя пользователя с помощью формы. Результат запишите в переменую $name. Выведите на экран фразу 'Привет, %Имя%'. Показать решение.

1.  Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.

    ```
    Привет, Дмитрий, 25 лет.
    Твое сообщение: ...
    ```

1.  Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее. Показать решение.

1.  Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass, хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'. Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь. Показать решение.

### Атрибуты value и placeholder
1.  Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Сделайте так, чтобы после отправки формы значения ее полей не пропадали. Показать решение.

1.  Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки формы значения его полей не пропадали. Показать решение.