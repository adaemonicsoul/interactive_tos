<?php

    namespace InteractiveTOS\BusinessBundle\Service {

        use InteractiveTOS\BusinessBundle\Dao\TosDao;
        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\TosItem;
        use InteractiveTOS\BusinessBundle\Entity\User;
        use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
                $paragraphs = explode(PHP_EOL, $text);

                $tos = new Tos();
                $tos->setTitle($title);
                $tos->setUser($user);

                foreach ($paragraphs as $paragraph) {
                    $similarItems = $this->tosDao->searchItems($paragraph);

                    $tosItem = new TosItem();
                    $tosItem->setText($paragraph);
                    $tosItem->setSimilarItems($similarItems);

                    $tos->getTosItems()->add($tosItem);
                }

                return $tos;
            }
        }

    }

?>