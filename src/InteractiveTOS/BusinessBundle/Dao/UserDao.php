<?php

    namespace InteractiveTOS\BusinessBundle\Dao {

        use InteractiveTOS\BusinessBundle\Entity\User;

        class UserDao extends AbstractDao {

            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:User');
            }

            /**
             * @return User[]
             */
            public function getAll() {
                return $this->getRepository()->findAll();
            }
        }

    }

?>