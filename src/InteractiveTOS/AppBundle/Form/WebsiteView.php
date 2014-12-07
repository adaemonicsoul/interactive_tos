<?php


    namespace InteractiveTOS\AppBundle\Form {


        class WebsiteView {
            /** @var  string */
            private $address;

            /**
             * @return string
             */
            public function getAddress() {
                return $this->address;
            }

            /**
             * @param string $address
             */
            public function setAddress($address) {
                $this->address = $address;
            }
        }


    }

 