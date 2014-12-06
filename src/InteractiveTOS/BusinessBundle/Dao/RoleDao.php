<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        use InteractiveTOS\BusinessBundle\Entity\Role;

        class RoleDao extends AbstractDao {
            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Role');
            }

            /**
             * @return Role[]
             */
            public function getAll() {
                return $this->getRepository()->findAll();
            }

            /**
             * @param int $roleId
             *
             * @return Role
             */
            public function get($roleId) {
                return $this->getRepository()->find($roleId);
            }

            /**
             * @param $role
             */
            public function save($role) {
                $this->save($role);
            }

            /**
             * @param $role
             */
            public function delete($role) {
                $this->delete($role);
            }
        }
    }

 