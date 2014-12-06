<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        use InteractiveTOS\BusinessBundle\Entity\Website;

        class WebsiteDao extends AbstractDao {
            public function __construct() {
                parent::__construct('InteractiveTOSBusinessBundle:Website');
            }

            /**
             * @return Website[]
             */
            public function getAll() {
                return $this->getRepository()->findAll();
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
             * @param $website
             */
            public function save($website) {
                $this->save($website);
            }

            /**
             * @param $website
             */
            public function delete($website) {
                $this->delete($website);
            }
        }


    }

 