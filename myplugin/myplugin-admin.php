<?php defined( 'ABSPATH' ) or die( 'No direct script access allowed!' );

/*
Plugin Name:  FestivalTheme Plugin
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin Header Comment
Version:      1
Author:       O POVO
Author URI:   https://www.opovo.com.br
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

?>

<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
		<div id="universal-message-container">
            <div class="options">
                <p>
                    <label>Insira abaixo a data que o evento irá ocorrer</label>
                    <br />
                    <label>Ex: 04/11/2018</label>
                    <br />
                    <input type="text" name="acme-message" value="" />
                </p>
        </div>
		<?php submit_button(); ?>
	</form>
</div>