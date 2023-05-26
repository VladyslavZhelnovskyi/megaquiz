<?php


    namespace Project_Woo\Core;


    class ForwardViewComponent implements ViewComponent
    {
        public function __construct(private ? string $path)
        {
        }

        public function render(Request $request): void
        {

            if($request->getPropertyString())
            {
                $property = $request->getPropertyString();
                $request->forward($this->path.'/'.$property);
            }
            else
            {
                $request->forward($this->path);
            }
        }
    }