<?php


    namespace Project_Woo\Logic;

    use Project_Woo\Core\Collection;
    use Project_Woo\Core\DomainObject;
    use Project_Woo\Core\ObjectWatcher;
    use Project_Woo\Core\Registry;

    abstract class Mapper
    {
        protected \PDO $pdo;

        public function __construct()
        {
            $reg = Registry::instance();
            $this->pdo = $reg->getPdo();
        }

        private function getFromMap($id): ? DomainObject
        {
            return ObjectWatcher::exists(
                $this->targetClass(),
                $id
            );
        }

        public function find(int $id): ? DomainObject
        {
            $old = $this->getFromMap($id);

            if(!is_null($old))
            {
                return $old;
            }

            $this->selectStmt()->execute([$id]);
            $row = $this->selectStmt()->fetch();
            $this->selectStmt()->closeCursor();

            if(! is_array($row))
            {
                return null;
            }
            if(! isset($row['id']))
            {
                return null;
            }

            $object = $this->createObject($row);
            return $object;
        }

        public function findAll(): Collection
        {
            $this->selectAllStmt()->execute([]);
            return $this->getCollection(
                $this->selectAllStmt()->fetchAll()
            );
        }

        public function createObject(array $raw): DomainObject
        {
            $old = $this->getFromMap($raw['id']);

            if(! is_null($old))
            {
                return $old;
            }

            $obj = $this->doCreateObject($raw);
            $this->addToMap($obj);

            return $obj;
        }

        public function insert(DomainObject $obj): void
        {
            $this->doInsert($obj);
            $this->addToMap($obj);
        }

        private function addToMap(DomainObject $obj)
        {
            ObjectWatcher::add($obj);
        }

        abstract public function update(DomainObject $object): void;
        abstract protected function doCreateObject(array $raw): DomainObject;
        abstract protected function doInsert(DomainObject $object): void;
        abstract protected function selectStmt(): \PDOStatement;
        abstract protected function selectAllStmt(): \PDOStatement;
        abstract protected function getCollection(array $raw): Collection;
        abstract protected function targetClass(): string;
    }