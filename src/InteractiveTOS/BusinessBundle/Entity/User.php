<?php

    namespace InteractiveTOS\BusinessBundle\Entity {

        use Doctrine\Common\Collections\ArrayCollection;
        use Doctrine\ORM\Mapping as ORM;

        /**
         * Class User
         * @package InteractiveTOS\BusinessBundle\Entity
         * @ORM\Entity
         * @ORM\Table(name="user")
         */
        class User {
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
            private $username;
            /**
             * @var string
             * @ORM\Column(type="string")
             */
            private $password;
            /**
             * @var string
             * @ORM\Column(type="string")
             */
            private $firstName;
            /**
             * @var string
             * @ORM\Column(type="string")
             */
            private $lastName;
            /**
             * @var Role[]
             * @ORM\ManyToMany(targetEntity="Role")
             */
            private $roles;
            /**
             * @var Website[]
             * @ORM\OneToMany(targetEntity="Website", mappedBy="user")
             */
            private $websites;

            public function __construct() {
                $this->roles = new ArrayCollection();
            }

            /**
             * @return string
             */
            public function getFirstName() {
                return $this->firstName;
            }

            /**
             * @param string $firstName
             */
            public function setFirstName($firstName) {
                $this->firstName = $firstName;
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
             * @return string
             */
            public function getLastName() {
                return $this->lastName;
            }

            /**
             * @param string $lastName
             */
            public function setLastName($lastName) {
                $this->lastName = $lastName;
            }

            /**
             * @return Role[]
             */
            public function getRoles() {
                return $this->roles;
            }

            /**
             * @param Role[] $roles
             */
            public function setRoles($roles) {
                $this->roles = $roles;
            }

            /**
             * @return string
             */
            public function getUsername() {
                return $this->username;
            }

            /**
             * @param string $username
             */
            public function setUsername($username) {
                $this->username = $username;
            }

            /**
             * @return Website[]
             */
            public function getWebsites() {
                return $this->websites;
            }

            /**
             * @param Website[] $websites
             */
            public function setWebsites($websites) {
                $this->websites = $websites;
            }

            /**
             * @return string
             */
            public function getPassword() {
                return $this->password;
            }

            /**
             * @param string $password
             */
            public function setPassword($password) {
                $this->password = $password;
            }
        }

    }

?>