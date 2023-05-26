<?php


    namespace Project_Woo\Core;


    class Venue extends DomainObject
    {
        private SpaceCollection $spaces;
        private string $name;

        public function __construct(int $id, string $name)
        {
            $this->name = $name;
            $this->spaces = self::getCollection(SpaceCollection::class);
            parent::__construct($id);
        }

        public function getSpace(): SpaceCollection
        {
            return $this->spaces;
        }

        public function setSpace(SpaceCollection $spaces)
        {
            $this->spaces = $spaces;
        }

        public function addSpace(SpaceCollection $space): void
        {
            $this->spaces->add($space);
            $space->setVenue($this);
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setName(string $name)
        {
            $this->name = $name;
        }
    }