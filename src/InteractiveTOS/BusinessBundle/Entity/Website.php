<?php

    namespace InteractiveTOS\BusinessBundle\Entity {

        use Doctrine\Common\Collections\ArrayCollection;
        use Doctrine\ORM\Mapping as ORM;

        /**
         * Class Website
         * @package InteractiveTOS\BusinessBundle\Entity
         * @ORM\Entity
         * @ORM\Table(name="website")
         */
        class Website {
            /**
             * @var int
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            private $id;
            /**
             * @var string
             * @ORM\Column(type="string")
             */
            private $address;
            /**
             * @var User
             * @ORM\ManyToOne(targetEntity="User", inversedBy="websites")
             */
            private $user;
            /**
             * @var Tos[]
             * @ORM\OneToMany(targetEntity("Tos", mappedBy="website")
             */
            private $tosList;

            public function __construct() {
                $this->tosList = new ArrayCollection();
            }

            /**
             * @return string
             */
            public function getAddress() {
                return $this->address;
            }

            /**
             * @param string $address
             */
            public function setAddress($address) {
                $this->address = $address;
            }

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
             * @return User
             */
            public function getUser() {
                return $this->user;
            }

            /**
             * @param User $user
             */
            public function setUser($user) {
                $this->user = $user;
            }

            /**
             * @return Tos[]
             */
            public function getTosList() {
                return $this->tosList;
            }

            /**
             * @param Tos[] $tosList
             */
            public function setTosList($tosList) {
                $this->tosList = $tosList;
            }
        }

    }

?>