<?php


    namespace InteractiveTOS\BusinessBundle\Entity {

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
            private $owner;

            /**
             * @var TosItem[]
             * @ORM\OneToMany(targetEntity="TosItem", mappedBy="tos")
             */
            private $tosItems;

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
            public function getOwner() {
                return $this->owner;
            }

            /**
             * @param User $owner
             */
            public function setOwner($owner) {
                $this->owner = $owner;
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

            public function __construct(){
                $this->tosItems = new TosItem[];
            }
        }
    }

 