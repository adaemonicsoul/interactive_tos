<?php

    namespace InteractiveTOS\BusinessBundle\Service {

        use InteractiveTOS\BusinessBundle\Dao\TosDao;
        use InteractiveTOS\BusinessBundle\Dao\TosSearchContext;
        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\TosItem;
        use InteractiveTOS\BusinessBundle\Entity\User;

        /**
         * Class TosService
         * @package InteractiveTOS\AppBundle\Service
         */
        class TosService {
            /**
             * @var TosDao
             */
            private $tosDao;

            /**
             * @return TosDao
             */
            public function getTosDao() {
                return $this->tosDao;
            }

            /**
             * @param TosDao $tosDao
             */
            public function setTosDao($tosDao) {
                $this->tosDao = $tosDao;
            }

            /**
             * @param Tos $tos
             */
            public function save(Tos $tos) {
                $this->tosDao->save($tos);
            }

            /**
             * @param string $title
             * @param string $text
             * @param User $user
             *
             * @return Tos
             */
            public function createTos($title, $text, User $user) {
                $tos = new Tos();
                $tos->setTitle($title);
                $tos->setUser($user);

                $tos->setTosItems($this->createTosItems($text));

                return $tos;
            }

            /**
             * @param string $text
             *
             * @return TosItem[]
             */
            public function createTosItems($text) {
                $paragraphs = explode(PHP_EOL, $text);

                $items = array();

                foreach ($paragraphs as $paragraph) {
                    $similarItems = $this->tosDao->searchItems($paragraph);

                    $tosItem = new TosItem();
                    $tosItem->setText($paragraph);
                    $tosItem->setSimilarItems($similarItems);

                    $items[] = $tosItem;
                }

                return $items;
            }

            /**
             * @param TosSearchContext $context
             *
             * @return Tos[]
             */
            public function search(TosSearchContext $context){
                return $this->tosDao->search($context);
            }
        }

    }

?>