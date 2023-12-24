# Task #1. Регион и два блока
### Заходим в themes/{your_theme_name} <br />
[![photo-2023-12-24-10-48-49.jpg](https://i.postimg.cc/LsX8bc3N/photo-2023-12-24-10-48-49.jpg)](https://postimg.cc/CR30Z6tq) <br /> <br />

### Внутри этой папки открывает файл {your_theme_name}.info.yml и в секцию regions добавляю свою кастомную  <br />
[![photo-2023-12-24-10-48-50.jpg](https://i.postimg.cc/bN9YNy6m/photo-2023-12-24-10-48-50.jpg)](https://postimg.cc/zV3YxrYh)  <br /> <br />

### В друпале в Схеме блоков добавится автоматически этот регион, сюда можно добавлить любые блоки и показать что они есть, это все равно нигде не отоборажается <br />
[![photo-2023-12-24-10-48-50-2.jpg](https://i.postimg.cc/mkGRBJ7x/photo-2023-12-24-10-48-50-2.jpg)](https://postimg.cc/jwvBh88v)  <br /> <br />
<br /> <br /> <br /> <br />



# Task #2. Ссылка на метриал
### Чтобы ссылка на материал появилась в меню, добавляем ссылку при редактировании материала. Вес указывает на порядок пунктов меню
[![photo-2023-12-24-10-53-26.jpg](https://i.postimg.cc/NfsqD14x/photo-2023-12-24-10-53-26.jpg)](https://postimg.cc/6Tmm54F7)  <br /> <br />
<br /> <br /> <br /> <br />




# Task #3
### ==== Уебанская установка колорбокса ====
1. colorbox-2.0.1.tar.gz добавляем через Расширения -> Добавить новый модуль (не забываем включить; можно просто разархивировать в папку modules/)
2. в корневой папке drupal ручками создаем папку libraries
3. в папку libraries добавляем содержимое архива colorbox.zip (должен получиться путь libraries/colorbox/jquery.colorbox-min.js)
4. [рис. 1] очищаем в друпале кеш (если что то не работает, всегда очищайте кэш, друпал хуйня и из-за кеша там половина функций не работает) <br />
   <a href='https://postimg.cc/w7zsN0Cn' target='_blank'><img src='https://i.postimg.cc/w7zsN0Cn/photo-2023-12-24-10-55-39.jpg' border='0' alt='photo-2023-12-24-10-55-39'/></a> <br/>
5. [рис. 2] заходим в структура -> типы материалов и редактируем нужный нам тип материала (e.g. статья)  <br />
   <a href='https://postimg.cc/tY9YJ7Pj' target='_blank'><img src='https://i.postimg.cc/tY9YJ7Pj/photo-2023-12-24-10-55-41.jpg' border='0' alt='photo-2023-12-24-10-55-41'/></a>  <br />
6. напротив типа картинки выбираем появивишийся colorbox (если не появился чистим кэш)
7. [рис. 3] после этого картинки будут "красиво" открываться  <br />
  <a href='https://postimg.cc/k2vr4Xxk' target='_blank'><img src='https://i.postimg.cc/k2vr4Xxk/photo-2023-12-24-10-55-41-2.jpg' border='0' alt='photo-2023-12-24-10-55-41-2'/></a>  <br />
8. как-то сюда надо добавить галерею из нескольких фото, но я хз как, и у нескольких людей приняли колорбокс с одной картинкой  <br /> <br />
<br /> <br /> <br /> <br /> 




# Task #4
### ==== Создание выпадающего меню ====
1. [рис. 4] Добавляем ссылку меню, в поле ссылка указываем <nolink>, ставим чекбокс "Показывать раскрытым", родительская - "основная навигация"  <br/>
<a href='https://postimg.cc/ns9Lgm8v' target='_blank'><img src='https://i.postimg.cc/ns9Lgm8v/photo-2023-12-24-10-55-42.jpg' border='0' alt='photo-2023-12-24-10-55-42'/></a>   <br/>
2. [рис.5] Добалвяем меню таксономии, на рисунке написано что выбирать  <br/>
<a href='https://postimg.cc/xNv5RqTQ' target='_blank'><img src='https://i.postimg.cc/xNv5RqTQ/photo-2023-12-24-10-55-42-2.jpg' border='0' alt='photo-2023-12-24-10-55-42-2'/></a>  <br/>
3. [рис.6] теперь при наведении на пункт меню он будет раскрываться на подпункты, в которых будет список из таксономии (если чет не работает - очищаем кэш + ставим другую тему. моя тема vani)  <br/>
<a href='https://postimg.cc/56Jnt5n2' target='_blank'><img src='https://i.postimg.cc/56Jnt5n2/photo-2023-12-24-10-55-43.jpg' border='0' alt='photo-2023-12-24-10-55-43'/></a>  <br/>
<br /> <br /> 


### ==== Создание меню ====
1. [рис. 7] Не помню как, но я как то добавил список своей таксономии в одно из станлартных меню - я добавил в Меню учетной записи пользователя  <br/>
<a href='https://postimg.cc/qhnxJgKK' target='_blank'><img src='https://i.postimg.cc/qhnxJgKK/photo-2023-12-24-10-55-43-2.jpg' border='0' alt='photo-2023-12-24-10-55-43-2'/></a> <br/>
2. [рис. 8] Заходим в Схему блоков, ищем Footer First, нажимаем "расположить блок" и добавляем меню в котором лежат термины таксономии (у меня Меню учётной записи пользователя)  <br/>
<a href='https://postimg.cc/HV34sqr6' target='_blank'><img src='https://i.postimg.cc/HV34sqr6/photo-2023-12-24-10-55-44.jpg' border='0' alt='photo-2023-12-24-10-55-44'/></a> <br/>
3. [рис.9 ] После этого по идее в футере должно отобразиться меню со списком пунктов меню + списком таксономии. мб кеш придется почистить  <br/>
<a href='https://postimg.cc/XZBwLXQP' target='_blank'><img src='https://i.postimg.cc/XZBwLXQP/photo-2023-12-24-10-55-45.jpg' border='0' alt='photo-2023-12-24-10-55-45'/></a> <br/>
