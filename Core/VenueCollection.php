<?php


    namespace Project_Woo\Core;


    class VenueCollection extends Collection
    {
        public function targetClass(): string
        {
            return Venue::class;
        }
    }