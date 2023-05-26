<?php


    namespace Project_Woo\Core;


    use Project_Woo\Core\Registry;

    abstract class Base
    {
        private  \PDO $pdo;

        public function __construct()
        {
            $reg = Registry::instance();
            $dsn = $reg->getDSN();
            if (is_null($dsn))
            {
                throw new AppException("DSN не определен");
            }
            $this->pdo = new \PDO($dsn['dsn'], $dsn['name'], $dsn['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function getPdo(): \PDO
        {
            return $this->pdo;
        }
    }