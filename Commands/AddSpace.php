<?php


    namespace Project_Woo\Commands;


    use Project_Woo\Core\Command;
    use Project_Woo\Core\Registry;
    use Project_Woo\Core\Request;

    class AddSpace extends Command
    {
        protected function doExecute(Request $request): int
        {
            $name = $request->getProperty("venue_name");
            $space = [$request->getProperty("space")];

            if(empty($space[0]))
            {
                $request->addFeedback("Место не предоствлено");
                return self::CMD_INSUFFICIENT_DATA;
            }
            else
            {
                $reg = Registry::instance();
                $venueManager = $reg->getVenueManager();
                $venueManager->addVenue($name, $space);

            }
            return self::CMD_DEFAULT;
        }
    }