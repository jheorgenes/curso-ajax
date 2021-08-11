<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'curso_ajax' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'px1A7g]<smEYr[9rC8W&0k@ |EYH[`*gJJ)W}mJqf|f82<)R1^#pB,$KYz$1 OX0' );
define( 'SECURE_AUTH_KEY',  'vXzj6;^TQp}~rM(IaeYJM8D>f?Vt=taW)K;uLR-0MDD`8-L-OQF38h`Ndxh?EO[a' );
define( 'LOGGED_IN_KEY',    'CM;v/]H<Q[;?~KM6[w<_TnFk8%`oI/4Po,$#Ddv-[|QwQr4;y;S^}<mqjCUBl,e5' );
define( 'NONCE_KEY',        '8yVb^~0dMff-Q]P01?}jQszNXqp[P]r<totCMwRf1go1=$)C|2A93b;OB82M3SjI' );
define( 'AUTH_SALT',        '-a<+ew}:~k*pZ=kIn]X:9(QjAp++Yzm@V=}+/@!k<b}}%fSm(5yWdf~<Hk=JDZ^|' );
define( 'SECURE_AUTH_SALT', 'sWFc^6?3`,r&M^O~y^*@n4q_D S5{emc>x!(oW]ZlEK-rOY}-WY}8S?e&hv_SzvM' );
define( 'LOGGED_IN_SALT',   'VikW&JL-MB}w4OBH`5[&?tW?o6{8fCV-qmxp);YyZ3gLF1>N zKw+T~$lD3FU|-X' );
define( 'NONCE_SALT',       'KEol-5!Q#! .H+%N-,dzAo*g1B[qXeTvi7_:w(i16^T9G#}C+jJO$$wzo r=jGD,' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
