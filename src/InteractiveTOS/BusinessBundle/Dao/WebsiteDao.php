<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        use InteractiveTOS\BusinessBundle\Entity\Website;

        class WebsiteDao extends AbstractDao {
            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Website');
            }

            /**
             * @param WebsiteSearchContext $context
             *
             * @return Website[]
             */
            public function search(WebsiteSearchContext $context) {
                $qb = $this->getRepository('InteractiveTOSBusinessBundle:Website')->createQueryBuilder('w');

                if(!empty($context->getText())){
                    $qb->where('w.address LIKE :text');
                    $qb->setParameter('text', $context->getText());
                }

                return $qb->getQuery()->getResult();
            }

            /**
             * @param int $websiteId
             *
             * @return Website
             */
            public function get($websiteId) {
                return $this->getRepository()->find($websiteId);
            }

            /**
             * @param Website $website
             */
            public function save(Website $website) {
                $this->saveOne($website);
            }

            /**
             * @param Website $website
             */
            public function delete(Website $website) {
                $this->deleteOne($website);
            }
        }


    }

 