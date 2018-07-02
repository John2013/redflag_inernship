# Задачи на основы языка PHP

## Примеры решения задач


**Задача.** Создайте переменную `$var` и присвойте ей значение `'hello'`. Обращаясь к отдельным символам этой строки выведите на 
экран символ `'h'`, символ `'e'`, символ `'o'`.

**Решение:** будем обращаться к отдельным символам этой строки, к примеру, буква `'h'` имеет номер 0 и ее можно 
вывести так - `$var[0]`, буква `'e'` имеет номер 1 и так далее:
```php
<?php
	$var = 'abcde';
	echo $var[0]; //выведем букву 'h'
	echo $var[1]; //выведем букву 'e'
	echo $var[4]; //выведем букву 'o'
?>
```

**Задача**. Напишите скрипт, который считает количество секунд в часе.

**Решение**: так как в минуте 60 секунд, а в часе - 60 минут, то умножив 60 на 60 мы получим количество секунд в часе:

```php
<?php
	echo 60 * 60;
?>
```

Если нам нужно получить количество секунд в сутках, то умножим еще и на 24 (так как в сутках 24 часа):

```php
<?php
	echo 60 * 60 * 24;
?>
```

**Задача**. Переделайте приведенный код так, чтобы в нем использовались операции +=, -=, *=, /=, ++, --. 
Количество строк кода при этом не должно измениться. Код для переделки:

```php
<?php
	$var = 1;
	$var = $var + 12;
	$var = $var - 14;
	$var = $var * 5;
	$var = $var / 7;
	$var = $var + 1;
	$var = $var - 1;
	echo $var;
?>
```

**Решение**: заменим все подходящие места на сокращенную форму записи. К примеру, вместо $var = $var + 12 можно 
написать $var += 12, а вместо $var = $var + 1 будет $var++. Результат переделки будет выглядеть так:

```php
<?php
	$var = 1;
	$var += 12;
	$var -= 14;
	$var *= 5;
	$var /= 7;
	$var++;
	$var--;
	echo $var;
?>
```

## Задачи для решения

### Работа с переменными

1.  Создайте переменную `$a` и присвойте ей значение `3`. Выведите значение этой переменной на экран.

2.  Создайте переменные `$a=10` и `$b=2`. Выведите на экран их сумму, разность, произведение и частное 
    (результат деления).

3.  Создайте переменные `$c=15` и `$d=2`. Просуммируйте их, а результат присвойте переменной `$result`. Выведите на экран 
    значение переменной `$result`.

4.  Создайте переменные `$a=10`, `$b=2` и `$c=5`. Выведите на экран их сумму.

5.  Создайте переменные `$a=17` и `$b=10`. Отнимите от `$a` переменную `$b` и результат присвойте переменной `$c`.
    Затем создайте переменную `$d`, присвойте ей значение `7`. Сложите переменные `$c` и `$d`, а результат запишите в
    переменную `$result`. Выведите на экран значение переменной `$result`.

### Работа со строками
1.  Создайте переменную `$text` и присвойте ей значение `'Привет, Мир!'`. Выведите значение этой переменной на экран.

2.  Создайте переменные `$text1='Привет, '` и `$text2='Мир!'`. С помощью этих переменных и операции сложения строк
    выведите на экран фразу `'Привет, Мир!'`.

3.  Создайте переменную `$name` и присвойте ей ваше имя. Выведите на экран фразу `'Привет, %Имя%!'`. Вместо `%Имя%`
    должно стоять ваше имя. Показать решение.

4.  Создайте переменную `$age` и присвойте ей ваш возраст. Выведите на экран `'Мне %Возраст% лет!'`.

### Обращение к символам строки
1.  Создайте переменную `$text` и присвойте ей значение `'abcde'`. Обращаясь к отдельным символам этой строки выведите
    на экран символ `'a'`, символ `'c'`, символ `'e'`.

2.  Дана произвольная строка, например, `'abcde'`. Поменяйте первую букву (то есть букву `'a'`) этой строки на `'!'`.

3.  Создайте переменную `$num` и присвойте ей значение `'12345'`. Найдите сумму цифр этого числа.

### Практика
1.  Напишите скрипт, который считает количество секунд в часе, в сутках, в месяце.

2.  Создайте три переменные - час, минута, секунда. С их помощью выведите текущее время в формате 
    `'час:минута:секунда'`.

3.  Создайте переменную, присвойте ей число. Возведите это число в квадрат (это значит нужно умножить его само на себя).
    Выведите его на экран.

### Работа с присваиванием и декрементами
1.  Переделайте этот код так, чтобы в нем использовались операции `+=`, `-=`, `*=`, `/=`. Количество строк кода при
    этом не должно измениться.
    
    ```php
    $var = 47;
    $var = $var + 7;
    $var = $var - 18;
    $var = $var * 10;
    $var = $var / 20;
    echo $var;
    ```

2.  Переделайте этот код так, чтобы в нем использовалась операция `.=`.
    Количество строк кода при этом не должно измениться.
    
    ```php
    $text = 'Я';
    $text = $text.' хочу';
    $text = $text.' знать';
    $text = $text.' PHP!';
    echo $text;
    ```

3.  Переделайте этот код так, чтобы в нем использовались операции `++` и `--`.
    Количество строк кода при этом не должно измениться.
    
    ```php
    $var = 10;
    $var = $var + 1;
    $var = $var + 1;
    $var = $var - 1;
    echo $var;
    ```

4.  Переделайте этот код так, чтобы в нем использовались операции `++`, `--`, `+=`, `-=`, `*=`, `/=`.
    Количество строк кода при этом не должно измениться.
    
    ```php
    $var = 10;
    $var = $var + 7;
    $var = $var + 1;
    $var = $var - 1;
    $var = $var + 12;
    $var = $var * 7;
    $var = $var - 15;
    echo $var;
    ```