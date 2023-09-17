<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'cms-2' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'wp_admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'GxJKl7355' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@#.dBfMXo`dV-Ig;hOJw@/8(-7+~bYL_b,90]o`6~Hc$S:.=J=EkpvxBA+CfPYay' );
define( 'SECURE_AUTH_KEY',  'Fk&A;c{D }<#qO2`NltLzaev?mY{N7^Tqt/C>oeFIPA?8JJ]DQ)<n!HoxLUN+G`Z' );
define( 'LOGGED_IN_KEY',    'Q~LsjTG*_(s&@kP#MUy,4ge7xW$A!yB3tlNhY%`A+gS6u!%yE6#)bBC6!#eoWUl ' );
define( 'NONCE_KEY',        '371$^a,s8^}lX0F{?T0m2E0Bz&}=OMAR5MM2M,@_)<xELFb6Q-~uSiScaHp;l6>2' );
define( 'AUTH_SALT',        '<z0kh?T0BJ[VT3h$Hv?uSF62G W[pArheh^lw817Q6/ WfNo&8Mrf+[8P)o!WNs-' );
define( 'SECURE_AUTH_SALT', '/HSitsUZ8teTqw[D8Q#~g^^P/mogyl<MW.tz0}!pJgz;U9Qk-(O<:BJ#fETwmu%D' );
define( 'LOGGED_IN_SALT',   'E-G#tF?*l|(Ks;$m:S-M):`2dPI;4|XF.b9Pj*Fv<};cvutFd<[0.ulZehB$yoo`' );
define( 'NONCE_SALT',       '|R,EPyvVxl#Rvtu&5]$R&r.pVD^bJ:+Qx+ke58IF*^fW3&#U$=T&~!nad,(j3|Ol' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
