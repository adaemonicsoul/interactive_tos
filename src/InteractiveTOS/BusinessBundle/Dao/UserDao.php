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

            /**
             * @param int $userId
             * @return User
             */
            public function get($userId){
                return $this->getRepository()->find($userId);
            }


            /**
             * @param $user
             */
            public function save($user){
                $this->saveOne($user);
            }

            /**
             * @param $user
             */
            public function delete($user){
                $this->deleteOne($user);
            }
        }

    }

?>