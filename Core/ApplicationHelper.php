<?php

    namespace Project_Woo\Core;


    class ApplicationHelper
    {
        private string $config = __DIR__."/../Data/woo_options.ini";
        private Registry $reg;

        public function __construct()
        {
            $this->reg = Registry::instance();
        }

        public function init(): void
        {
            $this->setupOptions();
            $request = new \Project_Woo\Core\HttpRequest();
            $this->reg->setRequest($request);
        }

        private function setupOptions(): void
        {
            if(!file_exists($this->config))
            {
                throw new \Exception("Файл не найден");
            }

            $options = parse_ini_file($this->config, true);

            $this->reg->setConf(new Conf($options['config']));
            $this->reg->setCommands(new Conf($options['commands']));

            $conf = $this->reg->getConf();

            $vcfile = $conf->get("viewcomponentfile");
            $cparse = new ViewComponentCompiler();
            $commandandviewdata = $cparse->parseFile($vcfile);
            $this->reg->setCommands($commandandviewdata);
        }
    }
