<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 17:48
 */

function notNull($v) {
    return isset($v) && $v != "";
}

function redirectTo($url) {
    ?><script type="text/javascript">
        setTimeout(function() {
            window.location.replace("<?php echo $url ?>");
        }, 0);
    </script><?php

}
function redirectToInline($url) {
    ?>
      window.location = '<?php echo $url ?>';
    <?php
}

