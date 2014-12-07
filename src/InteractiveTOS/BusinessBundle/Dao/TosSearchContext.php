<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        class TosSearchContext {
            /** @var  int */
            private $websiteId;

            /** @var  string */
            private $title;

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
             * @return int
             */
            public function getWebsiteId() {
                return $this->websiteId;
            }

            /**
             * @param int $websiteId
             */
            public function setWebsiteId($websiteId) {
                $this->websiteId = $websiteId;
            }
        }


    }

 