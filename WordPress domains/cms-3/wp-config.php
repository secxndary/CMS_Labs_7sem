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
define( 'DB_NAME', 'cms-3' );

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
define( 'AUTH_KEY',         'R|KY)H7HZP}v>GTc/RCYf2|]1n_B :d`3>p@@2*[:3h/y>Ted:[3>jYf1ohUEkQV' );
define( 'SECURE_AUTH_KEY',  'l0,-odAcC&pZO,+k[QUFv7n4qTxW++_=7byx@Pa!&vPeiCa2nmj+%UZ-HhD^W:c~' );
define( 'LOGGED_IN_KEY',    '@NpSY9e8Y6i=o~[Inl.,ZRC[,>KJ0%-XrEwd9~#lKpZ5j9,F/@uFP;taskiiZtiU' );
define( 'NONCE_KEY',        'gu)D-hq~u$?qag?PwB9kOI/dGe-mrq^u8;>[7Xqn<wHmr -q6@MZPB#3l#d)6PeE' );
define( 'AUTH_SALT',        '<%cq@1lk8_Ch?2vl?!Bcgn6<sI]3)MS>&b9v^Gbni0bdnBCZV)wc?,ARMzWL$3?C' );
define( 'SECURE_AUTH_SALT', '0by5L>%PsP|qO^lpAlQkno+]4?ejA6 #8LQ|~_/h(nS5TdWWVxkdc)Zvb;ujF,{;' );
define( 'LOGGED_IN_SALT',   'DO)X^8t0%tZ]02<9/I$-+lXL##VufA$QI R8wiN&;O*P&84qST{^GWJo?I][FGh#' );
define( 'NONCE_SALT',       'bxo.`0)xdT,@/daS|ke9+fT8=jTU|r1%4uhC}$8@.<}V/,Q))gax%OQr7WM!3Sk7' );

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
