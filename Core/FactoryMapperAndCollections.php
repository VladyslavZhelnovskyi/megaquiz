<?php


    namespace Project_Woo\Core;


    use Project_Woo\Logic\SpaceMapper;
    use Project_Woo\Logic\VenueMapper;

    class FactoryMapperAndCollections
    {
        private ? VenueMapper $venueMapper = null;
        private ? VenueCollection $venueCollection = null;
        private ? SpaceMapper $spaceMapper = null;
        private ? SpaceCollection $spaceCollection = null;

        public function getVenueMapper(): VenueMapper
        {
            if(is_null($this->venueMapper))
            {
                $this->venueMapper = new VenueMapper();
            }
            return $this->venueMapper;
        }

        public function getVenueCollection(): VenueCollection
        {
            if(is_null($this->venueCollection))
            {
                $this->venueCollection = new VenueCollection();
            }
            return $this->venueCollection;
        }

        public function getSpaceMapper(): SpaceMapper
        {
            if(is_null($this->spaceMapper))
            {
                $this->spaceMapper = new SpaceMapper();
            }
            return $this->spaceMapper;
        }

        public function getSpaceCollection(): SpaceCollection
        {
            if(is_null($this->spaceCollection))
            {
                $this->spaceCollection = new SpaceCollection();
            }
            return $this->spaceCollection;
        }

    }