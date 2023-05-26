<?php


    namespace Project_Woo\Commands;


    use Project_Woo\Core\Command;
    use Project_Woo\Core\Request;
    use Project_Woo\Core\Venue;
    use Project_Woo\Logic\VenueMapper;

    class DefaultCommand extends Command
    {
        protected function doExecute(Request $request): int
        {

            return self::CMD_DEFAULT;
        }
    }