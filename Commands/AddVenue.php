<?php


    namespace Project_Woo\Commands;


    use Project_Woo\Core\Command;
    use Project_Woo\Core\Registry;
    use Project_Woo\Core\Request;
    use Project_Woo\Core\Venue;
    use Project_Woo\Logic\VenueMapper;

    class AddVenue extends Command
    {
        protected function doExecute(Request $request): int
        {
//            $name = $request->getProperty("venue_name");
//            if(is_null($name))
//            {
//                $request->addFeedback("Имя не предоствлено");
//                return self::CMD_INSUFFICIENT_DATA;
//            }
//            else
//            {
//                /*$path = $request->getPath();
//                $request->setPath($path."/venue_name/".$name);*/
//                $request->addFeedback("'{$name}' added");
//                return self::CMD_OK;
//            }
//
//            $request->addFeedback("Welcome to Woo");
//            $mapper = new VenueMapper();
//            $venue = new Venue(-1, "The Likey Lounge");
//            $mapper->insert($venue);
//            $venue = $mapper->find($venue->getId());
//            print_r($venue);

//            $reg = Registry::instance();
//            $factory = $reg->getFactory();
//            $collection = $factory->getVenueCollection();
//
//            $collection->add(new Venue(-1, "Loud and Thumping"));
//            $collection->add(new Venue(-1, "Eeezy"));
//            $collection->add(new Venue(-1, "Ducj and Badger"));
//
//            foreach ($collection as $venue)
//            {
//                print $venue->getName()."\n";
//            }

            $reg = Registry::instance();
            $factory = $reg->getFactory();
            $spaceMapper = $factory->getSpaceMapper();

            $spaceCollection = $spaceMapper->findByVenue(50);

            foreach ($spaceCollection as $space)
            {
                print $space->getName();
                echo "<br>";
            }


            return self::CMD_DEFAULT;
        }
    }