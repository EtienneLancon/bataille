<?php
    use project\utilities\Batexception;
    set_exception_handler('error_handling');
    
    function error_handling($exception){
        //write some beatiful code in theory. there i just don't want to try catch.
        new Batexception($exception);
    }