<?php


    namespace Project_Woo\Core;


    interface ViewComponent
    {
        public function render(Request $request): void;
    }