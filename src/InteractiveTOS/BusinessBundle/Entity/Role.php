<?php

    namespace InteractiveTOS\BusinessBundle\Entity {

        use Doctrine\ORM\Mapping as ORM;

        /**
         * Class Role
         * @package InteractiveTOS\BusinessBundle\Entity
         * @ORM\Entity
         * @ORM\Table(name="role")
         */
        class Role {
            /**
             * @var int
             * @ORM\Id
             * @ORM\GeneratedValue(strategy="AUTO")
             * @ORM\Column(type="integer")
             */
            private $id;
            /**
             * @var string
             * @ORM\Column(type="string")
             */
            private $name;

            /**
             * @return int
             */
            public function getId() {
                return $this->id;
            }

            /**
             * @param int $id
             */
            public function setId($id) {
                $this->id = $id;
            }

            /**
             * @return string
             */
            public function getName() {
                return $this->name;
            }

            /**
             * @param string $name
             */
            public function setName($name) {
                $this->name = $name;
            }
        }

    }

?>