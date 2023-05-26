<?php


    namespace Project_Woo\Core;

    define("SEPARATOR", '/');

    class HttpRequest extends Request
    {
        public function init(): void
        {
            $URI = explode('/', $_SERVER['REQUEST_URI']);
            $this->path = SEPARATOR.$URI[1];
            $properties = array_slice($URI, 2);

            if(count($properties) > 1)
            {
                for ($i = 0; $i < count($properties); $i=$i+2)
                {
                    $this->properties +=  [$properties[$i] => $properties[$i+1]];
                }
            }

            $this->path=(empty($this->path)) ? SEPARATOR : $this->path;
        }

        public function forward(string $path): void
        {
            echo "Forward";
            header("Location: {$path}");
            exit;
        }


    }