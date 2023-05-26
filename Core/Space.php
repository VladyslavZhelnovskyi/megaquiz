<?php


    namespace Project_Woo\Core;


    class Space extends DomainObject
    {
        private int $idSpace;
        private int $idVenue;
        private ? string $spaceName = null;
        private ? Event $event = null;
        private ? Venue $venue = null;

        public function __construct(int $idSpace, int $idVenue, string $spaceName, Event $event = null, Venue $venue = null)
        {
            $this->idSpace = $idSpace;
            $this->idVenue = $idVenue;
            $this->spaceName = $spaceName;
            $this->event = $event;
            $this->venue = $venue;
        }

        public function getName(): String
        {
            return $this->spaceName;
        }

        public function bookEvenet(Event $event)
        {
            $this->event = $event;
        }

        public function add(Venue $venue)
        {
            $this->venue = $venue;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->idSpace;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->idSpace = $id;
        }
    }