<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        use InteractiveTOS\BusinessBundle\Entity\TosItem;

        class TosItemDao extends AbstractDao {
            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:TosItem');
            }

            /**
             * @return TosItem[]
             */
            public function getAll() {
                return $this->getRepository()->findAll();
            }

            /**
             * @param int $tosItemId
             *
             * @return TosItem
             */
            public function get($tosItemId) {
                return $this->getRepository()->find($tosItemId);
            }

            /**
             * @param $tosItem
             */
            public function save($tosItem) {
                $this->save($tosItem);
            }

            /**
             * @param $tosItem
             */
            public function delete($tosItem) {
                $this->delete($tosItem);
            }
        }
    }

 