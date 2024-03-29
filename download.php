<?php
$file = "export/items_IsiSoft.xlsx";
$arquivo = "export/items_IsiSoft.xlsx";

if(isset($arquivo) && file_exists($arquivo)):
    switch(strtolower(substr(strrchr(basename($arquivo),"."),1))):
        case "pdf": $tipo="application/pdf"; break;
        case "exe": $tipo="application/octet-stream"; break;
        case "zip": $tipo="application/zip"; break;
        case "doc": $tipo="application/msword"; break;
        case "xls": $tipo="application/vnd.ms-excel"; break;
        case "xlsx": $tipo="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; break;
        case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
        case "gif": $tipo="image/gif"; break;
        case "png": $tipo="image/png"; break;
        case "jpg": $tipo="image/jpg"; break;
        case "mp3": $tipo="audio/mpeg"; break;
        case "php": // deixar vazio por seurança
        case "htm": // deixar vazio por seurança
        case "html": // deixar vazio por seurança
    endswitch;
    header("Content-Type: ".$tipo);
    header("Content-Length: ".filesize($arquivo));
    header("Content-Disposition: attachment; filename=".basename($arquivo));
    readfile($arquivo);
    exit;
endif;
