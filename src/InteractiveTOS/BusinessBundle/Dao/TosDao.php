<?php

    namespace InteractiveTOS\BusinessBundle\Dao {

        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\TosItem;

        class TosDao extends AbstractDao {

            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Tos');
            }

            /**
             * @param Tos $tos
             */
            public function save(Tos $tos) {
                $this->saveOne($tos);
            }

            /**
             * @param string $text
             *
             * @return TosItem[]
             */
            public function searchItems($text) {
                $qb = $this->getRepository('InteractiveTOSBusinessBundle:TosItem')->createQueryBuilder('ti')
                    ->where('ti.text = :text');

                $qb->setParameter('text', $text);

                return $qb->getQuery()->getResult();
            }
        }

    }

?>