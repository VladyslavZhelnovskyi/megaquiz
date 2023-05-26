<?php


    namespace Project_Woo\Logic;

    use Project_Woo\Core\DomainObject;
    use Project_Woo\Core\Venue;
    use Project_Woo\Core\VenueCollection;

    class VenueMapper extends Mapper
    {
        private \PDOStatement $selectStmt;
        private \PDOStatement $updateStmt;
        private \PDOStatement $insertStmt;
        private \PDOStatement $selectAllStmt;

        public function __construct()
        {
            parent::__construct();
            $this->selectAllStmt = $this->pdo->prepare("SELECT * FROM space");
            $this->selectStmt = $this->pdo->prepare("SELECT * FROM venue WHERE id=?");
            $this->updateStmt = $this->pdo->prepare("UPDATE venue SET name=?, id=? WHERE id=?");
            $this->insertStmt = $this->pdo->prepare("INSERT INTO venue (name) VALUES (?)");
        }

        protected function targetClass(): string
        {
            return Venue::class;
        }

        public function getCollection(array $raw): VenueCollection
        {
            return new VenueCollection($raw, $this);
        }

        protected function doCreateObject(array $raw): Venue
        {
            $obj = new Venue(
                (int)$raw['id'],
                $raw['name']
            );
            $spacemapper = new SpaceMapper();
            $spacecollection = $spacemapper->findByVenue($raw['id']);
            $obj->setSpace($spacecollection);
            return $obj;
        }

        protected function doInsert(DomainObject $obj): void
        {
            echo "DoInsert <br>";
            $values = [$obj->getName()];
            $this->insertStmt->execute($values);
            $id = $this->pdo->lastInsertId();
            print_r($id);
            $obj->setId((int)$id);
        }

        public function update(DomainObject $obj): void
        {
            $values = [
                $obj->getName(),
                $obj->getId(),
                $obj->getId()
            ];
            $this->updateStmt->execute($values);
        }

        public function selectStmt(): \PDOStatement
        {
            return $this->selectStmt;
        }

        public function selectAllStmt(): \PDOStatement
        {
            return $this->selectAllStmt;
        }
    }
