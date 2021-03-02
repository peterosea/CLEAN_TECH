<?php

/**
 * equipment script
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function equipmentScript()
{
?>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/template-single/equipment.js"></script>
<?php
}
add_action('wp_footer', 'equipmentScript');
