<?php


    namespace Project_Woo\Core;


    class SpaceCollection extends Collection
    {
        public function targetClass(): string
        {
            return Space::class;
        }
    }