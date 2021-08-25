<?php
spl_autoload_register(function ($filename) {
    $file = $filename . '.php';
    if (DIRECTORY_SEPARATOR === '/') :
        $file = str_replace('\\', '/', $file);
    endif;
    if (file_exists($file)) :
        require $file;
    else :
        echo 'Erro ao importar o arquivo!';
    endif;
});
