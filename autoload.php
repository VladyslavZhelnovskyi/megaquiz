<?php

    spl_autoload_register(
        function (string $classname)
        {
            $file = __DIR__ .str_replace('\\', '/', $classname).".php";
            $file = str_replace('Project_Woo', '', $file);

            if(file_exists($file))
            {
                require_once($file);
            }
        }
    );

