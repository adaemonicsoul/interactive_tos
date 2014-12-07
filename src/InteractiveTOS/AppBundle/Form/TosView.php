<?php


    namespace InteractiveTOS\AppBundle\Form {


        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\User;

        class TosView {
            /**
             * @var string
             */
            private $title;

            /**
             * @var string
             */
            private $content;

            /**
             * @param Tos $tos
             */
            public function __construct(Tos $tos){
                $this->title = $tos->getTitle();
                $textItems = array();
                foreach ($tos->getTosItems() as $tosItem) {
                    $textItems[] = $tosItem->getText();
                }

                $this->content = join(PHP_EOL, $textItems);
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
            public function getContent() {
                return $this->content;
            }

            /**
             * @param string $text
             */
            public function setContent($text) {
                $this->content = $text;
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

 