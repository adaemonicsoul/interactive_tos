<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        use InteractiveTOS\BusinessBundle\Entity\Tos;

        class TosDao extends AbstractDao {
            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Tos');
            }

            /**
             * @return Tos[]
             */
            public function getAll() {
                return $this->getRepository()->findAll();
            }

            /**
             * @param int $tosId
             *
             * @return Tos
             */
            public function get($tosId) {
                return $this->getRepository()->find($tosId);
            }

            /**
             * @param $tos
             */
            public function save($tos) {
                $this->save($tos);
            }

            /**
             * @param $tos
             */
            public function delete($tos) {
                $this->delete($tos);
            }
        }
    }

 