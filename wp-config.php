<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'com_manager');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '~mc$<wD&?t@7F c^O/N~uo=.-#};StNKXVZpT|55jCf r|:5o9:IHi<a^&a;YHH:');
define('SECURE_AUTH_KEY', 'kjjFC>,%&??MbCU;tgT3ZbwvNbE=fr$e#+{]@!4[sEwVct;2V+bS)x<u $B?D5``');
define('LOGGED_IN_KEY', '=g!odey.%Ie3PKk&(3e,M)g>?Vn c1P2LR)iL~Q6,/Y.B8rp4eQ~QnDH~dD*dd/Q');
define('NONCE_KEY', 'WcH5n^K!fnR,mXi#i2]i*+I5fSo}s;7;V{ (Tx,qA@b3wY48G~6pgFVe$%1ej=SX');
define('AUTH_SALT', 'avy(Rl3.`%IXBZV}j`NR}%Z=L3ap>~Y$RiwkrqPpxY(]}0VnN:RJn$>V98P4.~rC');
define('SECURE_AUTH_SALT', '*32.+0i1|CWE-J#fZ8X}Nof=9?U{^#G+n^rb;V[,dmH%Xv7eN1x;UE|19[a}pR[L');
define('LOGGED_IN_SALT', 'dB#.zwa6(p,CdAb9js360^o>qv/Y@+8Y8{:YDjBC):V:,w]A>9aDRf3GM^^dT9c:');
define('NONCE_SALT', 'qCfI TBkA,65hwIP8w;Z*Q8i(5>M:tpsyo?zX325!:LNT9{f Oi Na&(8~.WNXDL');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

