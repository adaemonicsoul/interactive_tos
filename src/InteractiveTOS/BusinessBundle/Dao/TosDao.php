<?php

    namespace InteractiveTOS\BusinessBundle\Dao {

        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\TosItem;

        class TosDao extends AbstractDao {

            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Tos');
            }

            /**
             * @param int $tosId
             *
             * @return null|Tos
             */
            public function get($tosId){
                return $this->getRepository()->find($tosId);
            }

            /**
             * @param TosSearchContext $context
             *
             * @return Tos[]
             */
            public function search(TosSearchContext $context) {
                $qb = $this->getRepository('InteractiveTOSBusinessBundle:Tos')->createQueryBuilder('t');
                $isWhereUsed = false;

                if(!empty($context->getTitle())){
                    $qb->where('t.title = :title');
                    $qb->setParameter('title', $context->getTitle());
                    $isWhereUsed = true;
                }

                if(!empty($context->getWebsiteId())){
                    if(!$isWhereUsed){
                        $qb->where('t.websiteId = :websiteId');
                    }
                    else{
                        $qb->andWhere('t.websiteId = :websiteId');
                        $isWhereUsed = true;
                    }
                    $qb->setParameter('websiteId', $context->getTitle());
                }

                return $qb->getQuery()->getResult();
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