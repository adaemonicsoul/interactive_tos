<?php


    namespace InteractiveTOS\AppBundle\Form {


        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\User;

        class TosProfile {
            /**
             * @var string
             */
            private $title;

            /**
             * @var string
             */
            private $text;

            /**
             * @var User
             */
            private $user;

            /**
             * @param Tos $tos
             */
            public function __construct(Tos $tos){
                $this->title = $tos->getTitle();
                $this->user = $tos->getUser();
                $textItems = array();
                foreach ($tos->getTosItems() as $tosItem) {
                    $textItems[] = $tosItem->getText();
                }

                $this->text = join(PHP_EOL, $textItems);
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
        }


    }

 