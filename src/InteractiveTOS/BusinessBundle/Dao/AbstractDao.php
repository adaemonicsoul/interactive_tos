<?php

    namespace InteractiveTOS\BusinessBundle\Dao {

        use Doctrine\Bundle\DoctrineBundle\Registry;
        use Doctrine\ORM\EntityRepository;

        /**
         * Class AbstractDao
         * @package InteractiveTOS\BusinessBundle\Entity
         */
        abstract class AbstractDao {
            /**
             * @var Registry
             */
            private $registry;

            /**
             * @var string
             */
            private $persistentObjectName;

            /**
             * @param string $persistentObjectName
             */
            protected function __construct($persistentObjectName) {
                $this->persistentObjectName = $persistentObjectName;
            }

            /**
             * @param \Doctrine\Bundle\DoctrineBundle\Registry $registry
             */
            public function setRegistry($registry) {
                $this->registry = $registry;
            }

            /**
             * @return \Doctrine\Bundle\DoctrineBundle\Registry
             */
            public function getRegistry() {
                return $this->registry;
            }

            /**
             * @param string|null $persistentObjectName
             *
             * @return EntityRepository
             */
            protected function getRepository($persistentObjectName = NULL) {
                $persistentObjectName = empty($persistentObjectName) ? $this->persistentObjectName : $persistentObjectName;

                return $this->getRegistry()->getRepository($persistentObjectName);
            }

            /**
             * @param object $object
             */
            protected function saveOne($object) {
                $manager = $this->getRegistry()->getManager();
                $manager->persist($object);
                $manager->flush();
            }

            /**
             * @param object $object
             */
            protected function deleteOne($object) {
                $manager = $this->getRegistry()->getManager();
                $manager->remove($object);
                $manager->flush();
            }
        }

    }

?>