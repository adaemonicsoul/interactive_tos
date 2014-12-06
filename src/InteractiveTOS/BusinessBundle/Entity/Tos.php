<?php


    namespace InteractiveTOS\BusinessBundle\Entity {

        use Doctrine\Common\Collections\ArrayCollection;
        use Doctrine\ORM\Mapping as ORM;

        /**
         * Class Tos
         * @package InteractiveTOS\BusinessBundle\Entity
         * @ORM\Entity
         * @ORM\Table(name="tos")
         */
        class Tos {
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
            private $title;

            /**
             * @var User
             * @ORM\OneToOne(targetEntity="User")
             */
            private $user;

            /**
             * @var TosItem[]
             * @ORM\OneToMany(targetEntity="TosItem", mappedBy="tos", cascade={"persist", "remove"})
             */
            private $tosItems;
            /**
             * @var Website
             * @ORM\ManyToOne(targetEntity="Website", inversedBy="tosList")
             */
            private $website;

            public function __construct() {
                $this->tosItems = new ArrayCollection();
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
             * @return string
             */
            public function getTitle() {
                return $this->title;
            }

            /**
             * @param string $title
             */
            public function setTitle($title) {
                $this->title = $title;
            }

            /**
             * @return TosItem[]
             */
            public function getTosItems() {
                return $this->tosItems;
            }

            /**
             * @param TosItem[] $tosItems
             */
            public function setTosItems($tosItems) {
                $this->tosItems = $tosItems;
            }

            /**
             * @return Website
             */
            public function getWebsite() {
                return $this->website;
            }

            /**
             * @param Website $website
             */
            public function setWebsite($website) {
                $this->website = $website;
            }
        }
    }

 