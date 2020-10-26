<?php
    //echo php_sapi_name(); exit;

    require('project/utilities/errorhandler.php');
    require('project/utilities/batexception.php');
    require('project/utilities/usual.php');
    require('project/battle/player.php');
    require('project/battle/game.php');

    use project\battle\Game;
    use project\battle\Player;
    
    $p1 = new Player('Andros');
    $p2 = new Player('Starfox');
    
    $game = new Game($p1, $p2);
    $game->play();