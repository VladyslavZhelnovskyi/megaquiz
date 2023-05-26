<?php


    namespace Project_Woo\Core;


    class Event
    {
        private int $id;
        private ? string $eventName = null;
        private ? Event $intersectsEvent = null;

        private function getName(): String
        {
            return $this->eventName;
        }

        private function intersects(Event $event)
        {
            $this->intersectsEvent = $event;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }
    }