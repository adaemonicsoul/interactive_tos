<?php


    namespace InteractiveTOS\BusinessBundle\Dao {


        class WebsiteSearchContext {
            /** @var  string; */
            private $text;

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
        }


    }

 