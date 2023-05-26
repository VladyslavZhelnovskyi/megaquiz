<?php


    namespace Project_Woo\Logic;


    use Project_Woo\Core\DomainObject;
    use Project_Woo\Core\Space;
    use Project_Woo\Core\SpaceCollection;

    class SpaceMapper extends Mapper
    {
        private \PDOStatement $selectAllStmt;
        private \PDOStatement $findByVenueStmt;

        public function __construct()
        {
            parent::__construct();
            $this->selectAllStmt = $this->pdo->prepare("SELECT * FROM space");
            $this->findByVenueStmt = $this->pdo->prepare("SELECT * FROM space WHERE venue=?");
        }

        public function getCollection(array $raw): SpaceCollection
        {
            return new SpaceCollection($raw, $this);
        }

        /**
         * @throws \Exception
         */
        public function findByVenue($vid): SpaceCollection
        {
            $this->findByVenueStmt->execute([$vid]);
            return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
        }

        public function update(DomainObject $object): void
        {
            // TODO: Implement update() method.
        }

        protected function doCreateObject(array $raw): DomainObject
        {
            $space = new Space($raw['id'], $raw['venue'], $raw['name']);
            return $space;
        }

        protected function doInsert(DomainObject $object): void
        {
            // TODO: Implement doInsert() method.
        }

        protected function selectStmt(): \PDOStatement
        {
            // TODO: Implement selectStmt() method.
        }

        protected function targetClass(): string
        {
            return Space::class;
        }

        protected function selectAllStmt(): \PDOStatement
        {
            return $this->selectAllStmt;
        }
    }