<?php

    function ln($nb = 1){
        $context = php_sapi_name();
        $clis = array('cli', 'cgi', 'cgi-fcgi');
        $cat = '';
        for($i = 0; $i < $nb; $i++){
            $cat .= (in_array($context, $clis)) ? PHP_EOL : "<br/>";
        }
        return $cat;
    }