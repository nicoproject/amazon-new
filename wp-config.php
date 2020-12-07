<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'amazon_new' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd=Me=YOf*6;X~`T3$Miav=10ASK#I!y|+~L&%jH73No>EP-4z<;7PI{p`{qrq_sb' );
define( 'SECURE_AUTH_KEY',  'o9<Peyl)c Y@)(x~<+}iT4]&|1LEc.kniyObVI9 tu4uhrIEGGyS6b)IT %?YoK?' );
define( 'LOGGED_IN_KEY',    '}r!2|W&XMx0;N[V&nPa1Ew}[x~8g%/i0Oh,yBtMDF#k6|)xEzX-0cnXfp~>}r:U{' );
define( 'NONCE_KEY',        '`~G<@E$cZ)mM}&8uQ*MH1gPKCdYQVpV2l$V?mLa.~ktl_P>6d(U!owQE&W%LK9?8' );
define( 'AUTH_SALT',        '8*uvE1=qw_rgtk.Gq+J^aX1gQ6K;|v| r-!P3l^mad !m2i3mM:c*U./I$D(Gh[$' );
define( 'SECURE_AUTH_SALT', '0zjQiF9H`jAAQmz%jv.>@o(qhV+a0-VT;v&99i@Pn*nCKf~U]%76I*|u{.kd4Ngo' );
define( 'LOGGED_IN_SALT',   'ch_4d}{Uf;$gj^Wkc^XHq4.mz$C~Nw|yIscF+[/m/2l*%#Z>JSUv{Oq-fRPg?~^/' );
define( 'NONCE_SALT',       'fX;yO1L7jA/K>S.}LU}*Y=z/YCC[l]FMqnQvd5kJi-LJt:MFo_ZqKBvr7~Kbkzx/' );

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
