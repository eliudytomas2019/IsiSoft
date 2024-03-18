<?php
define('MailHost', "mail.isisoft.ao");
define('Email', "online@isisoft.ao");
define('SenhaEmail', "##k@167435");
define('PortaEmail', "465");
define('EmailName', "A Equipe IsiSoft");

define('HOME', 'http://localhost/isisoft/');
define("THEME","isisoft/");
define("INCLUDE_PATH", HOME . 'themes' . THEME);
define("REQUIRE_PATH", 'theme'.DIRECTORY_SEPARATOR.THEME);

define('HOST', "localhost");
define('USER', "root");
define('PASS', "");
define('DBSA', "isisoft");

spl_autoload_register(function ($Class){
    $cDir = ['Conn', 'Config', 'AppData', '2022', '2023'];
    $iDir = null;

    foreach($cDir as $dirName):
        if(!$iDir && file_exists(__DIR__.DIRECTORY_SEPARATOR."_app".DIRECTORY_SEPARATOR."{$dirName}".DIRECTORY_SEPARATOR."{$Class}.class.php") && !is_dir(__DIR__.DIRECTORY_SEPARATOR."{$dirName}".DIRECTORY_SEPARATOR."{$Class}.class.php")):
            include_once(__DIR__.DIRECTORY_SEPARATOR."_app".DIRECTORY_SEPARATOR."{$dirName}".DIRECTORY_SEPARATOR."{$Class}.class.php");
            $iDir = true;
        endif;
    endforeach;

    if(!$iDir):
        trigger_error("Não foi possível incluir a {$Class}.class.php", E_USER_ERROR);
    endif;
});

define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

function WSError($ErrMsg, $ErrNo, $ErrDie = null){
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ACCEPT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));

    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if($ErrDie):
        die;
    endif;
}

function PHPError($ErrNo, $ErrMsg, $ErrFile, $ErrLine){
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : WS_ERROR));

    echo "<p class=\"trigger{$CssClass}\">";
    echo "<b> Erro na linha: # {$ErrLine} ::</b> {$ErrMsg} <br/>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if($ErrNo == E_USER_ERROR):
        die;
    endif;
}
set_error_handler('PHPError');