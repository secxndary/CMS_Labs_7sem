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
define( 'DB_NAME', 'cms-1' );

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
define( 'AUTH_KEY',         'nV-|<)`>h$nr*GUlhg=&~_J_]IoE>`Cc5 _rA`,9ty$+d Mg[]Ney;nn.qhV9[x&' );
define( 'SECURE_AUTH_KEY',  'R;9gOl.bGh>v=U(XuRnF)i1~2{1&r<dITTq>yM&Ki~,FrU*Tf+.x~x<DyK=2Pd*r' );
define( 'LOGGED_IN_KEY',    '>JB&7Q2g<rEDrPttr3vhuo,6l{>G@zb:3F.ix8U&gU+Ku6t{EX!h*@zy#XgVqfm_' );
define( 'NONCE_KEY',        'i=u g8;y8V[patC=r$yOYnzzADD(}M&iKn<!_IF{i[#NaU&|D20HOmL$Pu?ktRZY' );
define( 'AUTH_SALT',        'cP.k0cA,YBub{Opr1F8Y.JhkbX2W75i+GFeG8aWN`<DXCR^^ss6Rmx&a@4VA!<Zx' );
define( 'SECURE_AUTH_SALT', 'RL-MXji.^z!<JsQg=$ffa/vDQr)ShFon3;!h2%U)RYk*IPFdE$q4VbS3% ;L=SyL' );
define( 'LOGGED_IN_SALT',   'wrBzaFB%7v9O.)sH{1Vx1YSeu+ka+j/wp1:@4}2biQn>%<nm7e*}xK^2k{Z8)z#R' );
define( 'NONCE_SALT',       '|W:ePT.aT.RPb/i(0sK,[eRiO1$1Nx{8vmM-k+XxX%WAGyCCWMr=xO)mWgfOzCRg' );

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
