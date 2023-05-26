<?php


    namespace Project_Woo\Core;


    abstract class DomainObject
    {
        public function __construct(private int $id = 0)
        {
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public static function getCollection (string $type): Collection
        {
            return Collection::getCollection($type);
        }

        public function markDirty(): void
        {

        }
    }