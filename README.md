# Стажировка в Red flag

Задачи для стажировки в компанию Red Flag

## Часть I HTML

### Задачи

1.  Напишите код HTML, чтобы получить результат, приведенный на рис

    ![](http://htmlbook.ru/files/images/practical/03.png)

2.  Используя вложение тегов, сделайте список, приведенный на рис 

    ![](http://htmlbook.ru/files/images/practical/06.png)
    
    Обратите особое внимание на то, чтобы код был валидным.
3.  Сделайте текст, как показано на рис 

    ![](http://htmlbook.ru/files/images/practical/46.png)
    
    В качестве шрифта укажите Impact.
4.  Сделайте страницу, показанную на рис

    ![](http://htmlbook.ru/files/images/practical/70.png)
5.  Используя спецсимволы оформите текст, как показано на рис 

    ![](http://htmlbook.ru/files/images/practical/04.png)
    
    Обратите внимание на кавычки и тире в тексте.
6.  Сделайте страницу, результат которой показан на рис

    ![](http://htmlbook.ru/files/images/practical/71.png)
    
    Для добавления символов используйте следующие коды: `\2660, \2663, \2665, \2666`.
7.  Напишите код XHTML, чтобы получить результат, приведенный на рис

    ![](http://htmlbook.ru/files/images/practical/13.png)
8.  Создайте список, как показано на рис 

    ![](http://htmlbook.ru/files/images/practical/07.png)
    
    Ссылки не обязательно должны работать (т.е. вести на какие-то существующие файлы), 
    главное сохранить указанный вид и валидность кода.
9.  Создайте таблицу приведенную на рис 

    ![](http://htmlbook.ru/files/images/practical/08.png)
10. Сделайте в браузере ввод чисел, как показано на рис 

    ![](http://htmlbook.ru/files/images/practical/25.png)
11. Постройте таблицу шириной 600 пикселов с двумя колонками, 
    левая колонка занимает ширину 150 пикселов. 
    Содержимое колонок должно выравниваться по верхнему краю, 
    а сама таблица располагается по центру веб-страницы.
12. Создайте три файла с именами 1.html, 2.html и 3.html, 
    в каждом из них должен быть заголовок вида «Страница 1» и ссылка с текстом «Перейти». 
    Причем ссылки должны быть замкнуты по схеме кольца, 
    т.е. ссылка с документа 1.html должна вести на 2.html, 
    с файла 2.html на 3.html, а файл 3.html опять ссылается на 1.html.

## Часть II CSS

### Простые

1. Используя группирование и наследование оптимизируйте приведённый стиль.

    ```css
    a:link {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      text-decoration: none;
      font-size: 11px;
      color: #3A681A;
    }
    a:visited {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
      color: #3A681A;
      text-decoration: none;		
    }
    a:hover {
      text-decoration: none;
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
      color: #5CA22E;
    }
    a:active {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
      color: #DC0000;
    }
    .pole {
      border: 1px solid #008000;
      width: 95px;
      font-size: 11px;
      background-color: #E7F2D7;
      height: 17px;
    }
    .pole2 {
      border: 1px solid #008000;
      font-size: 11px;
      background-color: #E7F2D7;
      height: 17px;
    }
    ```

2. Исправьте приведённый код согласно следующим пунктам:
    - уберите устаревшие теги (`<center>`, `<font>`);
    - добавьте стили и перенесите всё оформление страницы в них;
    - валидный HTML5;
    - сделайте тот же макет вообще без использования таблиц.
   
    ```html
    <html>
    <body bgcolor="#001646">
    <center>
    <font face='Arial'>
    <table width='970' cellspacing='0' border='0' cellpadding="5">
    <tr height='280'>
    <td colspan='2'> <img src='./images/header.jpg' alt="*"></img></td>
    </tr>
    <tr bgcolor='black'>
    <td width='200' valign='top'>
    <font color="#ffffff">
    <table border='0'>
    <tr><td height='30' width='200' background='./images/back.jpg'><b>Главная</b></td></tr>
    <tr><td height='30' background='./images/back.jpg'><b>Новости</b></td></tr>
    <tr><td height='30' background='./images/back.jpg'><b>О компании</b></td></tr>
    <tr><td height='30' background='./images/back.jpg'><b>Продукция</b></td></tr>
    <tr><td height='30' background='./images/back.jpg'><b>Контакты</b></td></tr>
    </table>
    </font>
    </td> 
    <td><font color='#FFFFFF' face='Verdana' size='2'><p align='justify'>
    Декретное время пространственно неоднородно. Ганимед ищет азимут, тем не менее, 
    Дон Еманс включил в список всего 82-е Великие Кометы. Гелиоцентрическое расстояние 
    постоянно. Каллисто ищет космический лимб, однако большинство спутников движутся 
    вокруг своих планет в ту же сторону, в какую вращаются планеты. Эпоха решает 
    радиант, хотя это явно видно на фотогpафической пластинке, полученной с 
    помощью 1.2-метpового телескопа.</p>
    </font></td>
    </tr>
    <tr height='20'>
    <td colspan='2' align='center' bgcolor='#103898'>
    <font color='#ffffff'>&copy; Copyright ME, 2013</font></td>
    </tr>
    </table>
    </center>
    </font>
    </body>
    </html>
     ```

3. Аня написала следующий код (пример 1) и получила страницу, показанную на рис 

    ![](http://htmlbook.ru/files/images/practical/30.png)
    
    Но Ане нужно, чтобы не было отступов между блоками, а также справа и слева от блоков. Какие изменения в код для этого требуется внести?
    
    ```html
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Блоки</title>
        <style>
         h1 {
          background: #569099;
          padding: 10px;
          color: #fff;
         }
         p {
          background: #cad8d0;
          padding: 10px;
         }
        </style>
    </head>
    <body>
     <h1>Вот такой чай</h1>
     <p>История о том, как один человек хотел попить чайку, но по ошибке 
     вместо воды попытался налить в чайник бензин, и что из этого получилось.</p>
    </body>
    </html>
    ```

4. 1.  С помощью стилей задайте цвет ссылок, как показано на рис

       ![](http://htmlbook.ru/files/images/practical/20.png)
   2.  Сделайте страницу с изображением флага Японии, как показано на рис 
   
       ![](http://htmlbook.ru/files/images/practical/65.png)
       
       Размер 300х200 пикселов, диаметр круга 120 пикселов. 
       Любые картинки применять запрещено, всё надо сделать с помощью CSS. 
       Страница должна корректно отображаться во всех современных браузерах.
   3.  Создайте таблицу, показанную на рис 
   
       ![](http://htmlbook.ru/files/images/practical/11.png)
       
       задав цвета через стили. Ширина таблицы составляет 100%.
   4.  Создайте веб-страницу с зеленым фоном и белым текстом, как показано на рис
    
       ![](http://htmlbook.ru/files/images/practical/02.png)
   5.  Сделайте набор квадратов, у которых меняется цвет заливки (рис. 1). 
       При наведении на любой квадрат его цвет меняется на оранжевый
       
       ![](http://htmlbook.ru/files/images/practical/68-2.png)

5. Сделайте стиль для печати следующего документа. 
   Цвет фона должен быть белым, текст — шрифт Times черного цвета, 12 пунктов.
   
   ```html
   <!DOCTYPE HTML>
   <html>
    <head>
     <meta charset="utf-8">
     <title>История Белоснежки</title>
     <style type="text/css">
      body {
       font: 11pt/14pt Arial, sans-serif;
       background: #f0f3ea;
       color: #6a835e;
      }
      h1 {
       color: #2f7fb2;
      }
      h2 {
       color: #7f6a49;
      }
     </style>
    </head>
    <body>
     <h1>История Белоснежки</h1>
     <p>Столкнувшись со сложной задачей создания полнометражного
     мультфильма, Дисней понимал, что имеющиеся технические средства ему 
     не подходят. Тогда он сам придумал и воплотил в жизнь многоплановую 
     камеру, идею которой в той или иной мере используют спустя десятилетия 
     после ее  изобретения.</p>
     <h2>Интересные факты</h2>
     <p>Уолт Дисней специально не смотрел на актрис, которые 
     пробовались на озвучивание роли  Белоснежки. Так он мог объективно 
     оценить голос. Однажды он услышал песню в великолепном исполнении.<br>
     — Ну, как? — спросили Уолта коллеги.<br>
     — Голос хорош, но... староват, — ответил Дисней.</p>
     <p>Эта была 14-летняя Дина Дурбин, впоследствии прославившаяся 
     на весь мир.</p>
    </body>
   </html>
   ```

### Средние

1. 1.  Сделайте страницу, как показано на рис 

       ![](http://htmlbook.ru/files/images/practical/62.png)
       
       Размеры всех частей заданы в пикселах и не меняются в процессе масштабирования окна. 
       Для каждой батарейки постарайтесь обойтись одним элементом.
   2.  Сделайте кнопку как на рисунке, используя только CSS. 
       ![](http://htmlbook.ru/files/images/practical/37.png)
   3.  Напишите для браузеров Firefox, Safari и Chrome стиль, реализующий кнопки, представленные на рис
   
       ![](http://htmlbook.ru/files/images/practical/14.png)
       
       Запрещено использовать любые изображения. Допустимо, что результат может немного различаться в браузерах.
   4.  Добавьте круглые значки поверх фотографии размером 600х380 пикселов, как показано на рис 
   
       ![](http://htmlbook.ru/files/images/practical/36.jpg)
       
       Значки должны располагаться по центру на расстоянии 16px от нижнего края. 
       При наведении на значок курсор мыши превращается в «руку».
       Один из значков показывает текущую фотографию, он выделяется красным цветом и свечением, 
       для него курсор мыши принимает значение по умолчанию.
       Код должен корректно работать в браузерах IE9+, Firefox 5+, Chrome 12+, Opera 11+. 
       Для IE8 важно сохранить функциональность, оформление может сильно отличаться.
   5.  Сделайте индикатор прогресса, как показано на рис 
   
       ![](http://htmlbook.ru/files/images/practical/58_1.png)
       
       Ширина самого элемента 100%, высота 20px. 
       Значение индикатора должно легко задаваться через ширину, как в процентах, так и пикселах.
       Для наглядности увеличенный фрагмент индикатора показан на рис 
       
       ![](http://htmlbook.ru/files/images/practical/58_2.png)
       
       Обратите внимание на градиенты, рамки и небольшую тень справа.
   6.  Сделайте уравнение как показано на рис
   
       ![](http://htmlbook.ru/files/images/practical/60.png)
       
       Знак корня должен отображаться корректно, независимо от используемого числа.
       
2. Для приведённого кода создайте стиль, с помощью которого можно получить результат, представленный на рис 

   ![](http://htmlbook.ru/files/images/practical/35.png)
   
   Страница должна корректно отображаться в браузерах IE8+, Firefox 5+, Opera 11+ и Chrome.
   Сам код приведён ниже и не должен меняться, за исключением раздела `<head>`.
   
   ```html
   <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
     <title>Квадраты</title>
    </head>
    <body>
     <div class="black"></div>
     <div class="white"></div>
    </body>
   </html>
   ```

3. Используя приведенный код HTML, оформите его с помощью стилей, как показано на рис 

   ![](http://htmlbook.ru/files/images/practical/28.png)
   
   Код должен остаться исходным, менять его запрещено, за исключением секции `<head>`.
   
   ```html
   <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
     <title>Нумерация страниц</title>
     <style>
     </style>
    </head> 
    <body>
     <div class="item-list">
      <ul class="pager">
       <li class="pager-current first"><span>1</span></li>
       <li class="pager-item"><a href="/node?page=1" title="На страницу номер 2">2</a></li>
       <li class="pager-item"><a href="/node?page=2" title="На страницу номер 3">3</a></li>
       <li class="pager-item"><a href="/node?page=3" title="На страницу номер 4">4</a></li>
       <li class="pager-next last"><a href="/node?page=1" title="На следующую страницу">›</a></li>
      </ul>
     </div>
     <p>Содержание</p>
    </body>
   </html>
   ```

4. Дан следующий код, который добавляет ссылки и устанавливает для них в стилях линию справа

   ![](http://htmlbook.ru/files/images/practical/34.png)
   
   Придумайте три способа, как убрать последнюю линию справа от ссылки. 
   При этом допускается только редактировать стили без изменения HTML-кода внутри `<body>`.
   
   ```html
   <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
     <title>Ссылки</title>
     <style>
      .links { 
       background: #F6967D;
      }
      .links a {
       color: #FFFDEB;
       display: inline-block;
       border-right: 1px solid #B62025;
       padding: 5px 10px;
      }
     </style>
    </head>
    <body>
     <div class="links">
       <a href="1.html">uno</a>
       <a href="2.html">dos</a>
       <a href="3.html">tres</a>
       <a href="4.html">cuatro</a>
     </div>
    </body>
   </html>
   ```

5. 1.  Сверстайте показанный на рис 

       ![](http://htmlbook.ru/files/images/practical/47_1.png)
       
       макет. Ширина колонок фиксирована и не зависит от размеров окна браузера.
       При наведении на любую колонку вокруг неё отображается тень 
       
       ![](http://htmlbook.ru/files/images/practical/47_2.png)
       
       http://htmlbook.ru/files/weather-sun.jpg
       
       http://htmlbook.ru/files/weather-snow.jpg
       
       http://htmlbook.ru/files/weather-blizzard.jpg
       
   2.  Сделайте страницу, показанную на рис 
   
       ![](http://htmlbook.ru/files/images/practical/51.png)
       
       Блок тянется вместе с шириной окна браузера, 
       ширина левой части с числом и положение кнопок справа не меняется.
   3.  Создайте меню, показанное на рис
   
       ![](http://htmlbook.ru/files/images/practical/18.png)
       
       с помощью тегов `<ul>`, `<li>` и с соблюдением следующих условий.
       - рисунки не используются, всё оформление реализуется средствами CSS;
       - меню должно корректно отображаться в современных браузерах.
       - ширина меню фиксирована и равна 200px.
   4.  Сделайте ссылку, которая при наведении на неё курсора мыши меняла свой вид, как показано на рис
    
       ![](http://htmlbook.ru/files/images/practical/54.png)
       
       Вверху показана исходная ссылка, внизу ссылка после наведения курсора.
   5.  Создайте страницу, показанную на рис 
   
       ![](http://htmlbook.ru/files/images/practical/32.png)
       
       Текст возле отмеченных галочек должен выделяться фоновым цветом. 
       Код должен корректно работать в последних версиях браузеров Internet Explorer, Firefox, Opera, Safari, Chrome.
   6.  Создайте страницу, показанную на рис 
   
       ![](http://htmlbook.ru/files/images/practical/40.png)
       
       без использования изображений. Страница должна корректно отображаться в последних версиях основных браузеров.
   7.  Сверстайте форму регистрации, показанную на рис 
   
       ![](http://htmlbook.ru/files/images/practical/53.png)
       
       Ширина формы и её полей фиксирована.
   8.  Поместите формулу и ее номер на страницу, причем формула, независимо от ширины окна браузера, 
       всегда располагается по центру, а номер по правому краю рис 
       
       ![](http://htmlbook.ru/files/images/practical/21.png)
       
       Результат должен корректно отображаться в браузерах IE8, Firefox 3, Opera 10, Safari 5, Chrome 6 и их старших
       версиях.
   9.  Создайте страницу как показано на рис 
   
       ![](http://htmlbook.ru/files/images/practical/42.png)
       
       Документ должен корректно отображаться во всех современных браузерах, в IE8 и ниже — градиент, тени и 
       скругления можно не выводить.
   10. Создайте таблицу представленную на рис
   
       ![](http://htmlbook.ru/files/images/practical/12.png)
       
       Должны соблюдаться следующие условия:
       - валидный строгий XHTML-код;
       - валидный CSS3;
       - к тегам внутри таблицы запрещается добавлять идентификаторы и классы;
       - содержимое третьей колонки выравнивается по центру.
   11. Сделайте страницу, как показано на рис 
   
       ![](http://htmlbook.ru/files/images/practical/41.png)
       
       которая корректно должна отображаться во всех современных браузерах.
       Обратите внимание на небольшой градиент в блоке, светлую рамку вокруг и скругление уголков снизу.
       (Текст для примера можно взять из википедии)

6. Измените стиль для таблицы, чтобы она получилась, как показано на рис 

   ![](http://htmlbook.ru/files/images/practical/075_2.gif)
   
   Вносить изменения в код таблицы нельзя, всё оформление должно делаться только через стили.
   
   ```html
   <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
     <title>Зебра</title>
     <style>
      .lux { 
       width: 300px;
       border: 1px solid #a52a2a;
       border-collapse: collapse;
       border-spacing: 0;
      }
      .lux th {
       background: #a52a2a;
       color: white; 
      }
      .lux td { 
       border-bottom: 1px solid black;
      }
      .lux td, .lux th {
       padding: 4px;
      }
     </style>
    </head>
    <body>
     <table class="lux">
      <tr><th></th><th>2004</th><th>2005</th><th>2006</th></tr>
      <tr><td>Рубины</td><td>43</td><td>51</td><td>79</td></tr>
      <tr><td>Изумруды</td><td>28</td><td>34</td><td>48</td></tr>
      <tr><td>Сапфиры</td><td>29</td><td>57</td><td>36</td></tr>
      <tr><td>Аметисты</td><td>23</td><td>64</td><td>97</td></tr>
     </table>
    </body>
   </html>
   ```

### Сложные

1.  Сделайте блок, показанный на рис 

    ![](http://htmlbook.ru/files/images/practical/k3.png)
    
    Блок содержит полупрозрачную градиентную рамку с градиентным фоном под заголовком и небольшим указателем.
    Фон на странице приведён лишь для наглядности эффекта полупрозрачности, вы можете указать любую свою картинку.
    Минимальная высота блока составляет 100px.
    Необходимо соблюсти следующие условия.
    - Валидная вёрстка на HTML5.
    - Валидность CSS не важна.
    - Таблицы и их имитация через стили не применяются.
    - Уголки имеют фиксированный размер, ширина и высота уголков одинакова, задаётся в пикселах.
    - Корректное отображение в браузерах IE9, Opera 11.10+, Firefox 5, Safari 5.0.5, Chrome 12+.
    - Допустимы незначительные отклонения от макета при отображении в разных браузерах.
    - Блок «резиновый», т.е. тянется по ширине окна браузера.
2.  Сделайте блок, показанный на рис 

    ![](http://htmlbook.ru/files/images/practical/k2.png)
    
    Блок содержит скругления в заголовке и внизу блока.
    Вокруг блока тёмно-зелёная рамка и тень.
    Длина заголовка может меняться, соответственно, должна изменяться и ширина блока под ним, но при этом не превышать 
    250px.
    Необходимо соблюсти следующие условия.
    - Валидная вёрстка на HTML5.
    - Валидность CSS не важна.
    - Таблицы и их имитация через стили не применяются.
    - Уголки имеют фиксированный размер, ширина и высота уголков одинакова, задаётся в пикселах.
    - Корректное отображение в браузерах IE9+, Opera 12+, Firefox 6+, Safari 5.1, Chrome 12+.
    - Допустимы незначительные отклонения от макета при отображении в разных браузерах.
    - Блок «резиновый», т.е. тянется по ширине окна браузера.
3.  Сделайте страницу, как показано на рис

    ![](http://htmlbook.ru/files/images/practical/49.png)
    
    Ширина блока резиновая и меняется в зависимости от размеров окна браузера.
    Указатель всегда располагается посередине блока, размеры указателя фиксированы.
4.  Придумайте четыре способа создания фигуры, показанной на рис

    ![](http://htmlbook.ru/files/images/practical/67.png)
    
    с помощью CSS, без дополнительных изображений и символов.
5.  Создайте блок с тенью фиксированного размера, в котором отображается картинка

    ![](http://htmlbook.ru/files/images/practical/43.jpg)
    
    Код должен корректно работать во всех современных браузерах.
    
    [картинка](http://htmlbook.ru/files/ranetka.jpg)
6.  Сделайте ниспадающее меню, показанное на рисунках.
    Исходный вид: 
    
    ![](http://htmlbook.ru/files/images/practical/48_1.png)
    
    При наведении на первый пункт: 
    
    ![](http://htmlbook.ru/files/images/practical/48_2.png)
    
    При наведении на второй пункт: 
    
    ![](http://htmlbook.ru/files/images/practical/48_3.png)
    
    Меню должно корректно отображаться в основных современных браузерах.
7.  Сделайте блок с фиксированным положением, который не будет изменять свою позицию при прокрутке страницы.
    Изначально блок практически полностью скрыт
    
    ![](http://htmlbook.ru/files/images/practical/66-1.png)
    
    но при наведении на него курсора мыши он плавно выезжает вправо 
    
    ![](http://htmlbook.ru/files/images/practical/66-2.png)
    
    Если курсор убрать, то блок плавно возвращается в исходное положение.
    Блок имеет фиксированные размеры и должен корректно отображаться в современных браузерах.
    [аватарка](http://htmlbook.ru/files/feedback.jpg)  
8.  Придумайте три способа создания блока, показанного на рис 

    ![](http://htmlbook.ru/files/images/practical/56.png)
    
    Ширина блока может задаваться в процентах или пикселах, высота фиксирована.
    Результат должен отображаться в современных браузерах. 
    Используйте свойство `box-shadow`.
    Используйте псевдоэлементы `::before` и `::after`.
9.  Сделайте страницу, как показано на рис

    ![](http://htmlbook.ru/files/images/practical/social.jpg)
    
    Иконки вокруг изображений являются ссылками, при наведении на них они меняют свой цвет (рис http://htmlbook.ru/files/images/practical/social-2.jpg).
    исходники:
    
    http://htmlbook.ru/files/person1.jpg
    http://htmlbook.ru/files/person2.jpg
    http://htmlbook.ru/files/person3.jpg
    http://htmlbook.ru/files/social_icons.png
10. Поле для игры в так-тикс имеет размер 5х5 клеток, в каждой клетке содержится круглая фишка
    
    ![](http://htmlbook.ru/files/images/practical/tak-tix1.png)
    
    При наведении курсора мыши на любую клетку подсвечивается ряд, строка и сама фишка
    
    ![](http://htmlbook.ru/files/images/practical/tak-tix2.png)
    
    Напишите код с использованием только HTML5 и CSS при соблюдении ряда условий:
    - работать должен во всех современных браузерах, на старые версии можно не обращать внимания;
    - все размеры фишек и клеток заданы изначально и не меняются;
    - постарайтесь сделать HTML-код компактным, без ввода дополнительных классов.
11. Сделайте таблицу 3х3 с фиксированной шириной и высотой ячеек. 
    При щелчке по любой ячейке в ней выводится изображение коня
    
    ![](http://htmlbook.ru/files/images/practical/63.png)
    
    Повторный щелчок по ячейке убирает в ней коня. Код должен работать во всех современных браузерах.
    Символ коня скопируйте отсюда: ♘
12. Создайте страницу, показанную на рис

    ![](http://htmlbook.ru/files/images/practical/55.png)
    
    Ширина блока фиксирована. Постарайтесь обойтись одним изображением, добавляя его как фоновый 
    [рисунок](http://htmlbook.ru/files/hosting.png).
    
13. Сделайте страницу, как показано на рис

    ![](http://htmlbook.ru/files/images/practical/61.png)
    
    Ориентируйтесь на последние версии браузеров, использовать стилевые префиксы не обязательно


