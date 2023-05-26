<?php


    namespace Project_Woo\Core;

    use Project_Woo\Logic\VenueManager;
    use Project_Woo\Logic\VenueMapper;

    class Registry
    {
        private static ? Registry $instance = null;
        private ? Request $request = null;
        private ? ApplicationHelper $applicationHelper = null;
        private ? Conf $conf = null;
        private ? Conf $commands = null;
        private ? Base $venueManager = null;
        private array $DSN = ['dsn'=>'mysql:dbname=Woo;host=localhost', 'name'=>'vlad', 'password'=>'1234'];
        private ? \PDO $pdo = null;
        private ? FactoryMapperAndCollections $factory = null;

        private function __construct()
        {
        }

        public static function instance(): self
        {
            if(is_null(self::$instance))
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function setRequest(Request $request): void
        {
            $this->request = $request;
        }

        public function getRequest(): Request
        {
            if(is_null($this->request))
            {
                throw new \Exception("Request не установлен");
            }
            return $this->request;
        }

        public function getApplicationHelper(): ApplicationHelper
        {
            if(is_null($this->applicationHelper))
            {
                $this->applicationHelper = new ApplicationHelper();
            }
            return $this->applicationHelper;
        }

        public function setConf(Conf $conf): void
        {
            $this->conf = $conf;
        }

        public function getConf(): Conf
        {
            if(is_null($this->conf))
            {
                $this->conf = new Conf();
            }
            return $this->conf;
        }

        public function setCommands(Conf $commands): void
        {
            $this->commands = $commands;
        }

        public function getCommands(): Conf
        {
            if(is_null($this->commands))
            {
                $this->commands = new Conf();
            }
            return $this->commands;
        }

        public function getVenueManager(): VenueManager
        {
            if(is_null($this->venueManager))
            {
                $this->venueManager = new VenueManager();
            }
            return $this->venueManager;
        }

        public function getDSN()
        {
            return $this->DSN;
        }

        public function getPdo()
        {
            if(is_null($this->pdo))
            {
                $dsn = $this->DSN;
                if (is_null($dsn))
                {
                    throw new \Exception("DSN не определен");
                }
                $this->pdo = new \PDO($dsn['dsn'], $dsn['name'], $dsn['password']);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            return $this->pdo;
        }

        public function getFactory(): FactoryMapperAndCollections
        {
                if(is_null($this->factory))
                {
                    $this->factory = new FactoryMapperAndCollections();
                }
                return $this->factory;
        }

    }