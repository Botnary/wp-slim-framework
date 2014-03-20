<?php
/**
 * Created by PhpStorm.
 * User: Constantin Botnari
 * Date: 3/20/14
 * Time: 9:51 AM
 */

namespace Slim;


class SlimWpOptions {
    function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }
    function admin_menu () {
        add_options_page( 'WP Slim','Slim Framework','manage_options','slim_framework', array( $this, 'settings_page' ) );
    }
    function  settings_page () {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            global $wp_rewrite;
            update_option('slim_base_path',$_REQUEST['slim_base_path']);
            $wp_rewrite->flush_rules(true);
        }
        ?>
        <div class="wrap">
            <h1>Slim Framework</h1>
            <form action="" method="post">
                <label>Base Path <input type="text" name="slim_base_path" value="<?php echo get_option('slim_base_path','slim/api/')?>"></label>
                <input type="submit" value="Update" class="button-primary">
            </form>
        </div>
    <?php
    }
}