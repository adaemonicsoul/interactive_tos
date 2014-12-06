<?php


    namespace InteractiveTOS\BusinessBundle\Entity {

        use Doctrine\Common\Collections\ArrayCollection;
        use Doctrine\ORM\Mapping as ORM;

        /**
         * Class Tos
         * @package InteractiveTOS\BusinessBundle\Entity
         * @ORM\Entity
         * @ORM\Table(name="tos_item")
         */
        class TosItem {
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
            private $text;

            /**
             * @var Tos
             * @ORM\ManyToOne(targetEntity="Tos", inversedBy="tosItems")
             */
            private $tos;
            /**
             * @var TosItem[]
             * @ORM\ManyToMany(targetEntity="TosItem")
             */
            private $similarItems;

            public function __construct() {
                $this->similarItems = new ArrayCollection();
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
            public function getText() {
                return $this->text;
            }

            /**
             * @param string $text
             */
            public function setText($text) {
                $this->text = $text;
            }

            /**
             * @return Tos
             */
            public function getTos() {
                return $this->tos;
            }

            /**
             * @param Tos $tos
             */
            public function setTos($tos) {
                $this->tos = $tos;
            }

            /**
             * @return TosItem[]
             */
            public function getSimilarItems() {
                return $this->similarItems;
            }

            /**
             * @param TosItem[] $similarItems
             */
            public function setSimilarItems($similarItems) {
                $this->similarItems = $similarItems;
            }
        }


    }

 