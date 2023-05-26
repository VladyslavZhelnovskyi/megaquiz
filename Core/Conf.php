<?php


    namespace Project_Woo\Core;


    class Conf
    {
        private array $conf_array = [];

        public function __construct(array $array = [])
        {
            $this->conf_array = $array;
        }

        public function set($index, $obj): void
        {
            $this->conf_array[$index] = $obj;
        }

        public function get(string $path)
        {
            return $this->conf_array[$path];
        }
    }