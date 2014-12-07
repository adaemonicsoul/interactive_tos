<?php


    namespace InteractiveTOS\AppBundle\Form {


        use InteractiveTOS\BusinessBundle\Entity\Category;

        class WebsiteView {
            /** @var  string */
            private $address;

            /** @var  Category */
            private $categories;

            /**
             * @return Category
             */
            public function getCategories() {
                return $this->categories;
            }

            /**
             * @param Category $categories
             */
            public function setCategories($categories) {
                $this->categories = $categories;
            }

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

 