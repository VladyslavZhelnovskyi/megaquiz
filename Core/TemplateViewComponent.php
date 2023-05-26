<?php


    namespace Project_Woo\Core;


    class TemplateViewComponent implements ViewComponent
    {
        public function __construct(private string $name)
        {
        }

        public function render(Request $request): void
        {
            $reg = Registry::instance();
            $conf = $reg->getConf();
            $path = $conf->get("templatepath");

            if(is_null($path))
            {
                throw new \Exception("Не найден каталог шаблонов");
            }
            $fullpath = __DIR__."{$path}/{$this->name}.php";
            if(!file_exists($fullpath))
            {
                throw new \Exception("Нет шаблона в {$fullpath}");
            }

            $feedback = $request->getFeedback();
            include ($fullpath);
        }
    }