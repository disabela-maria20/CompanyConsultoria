<?php
    if($_POST):
        echo('<pre>');
            print_r($_POST);
        echo('</pre>');
    else:
        echo 'Nenhuma informação foi enviada';
    endif;

?>