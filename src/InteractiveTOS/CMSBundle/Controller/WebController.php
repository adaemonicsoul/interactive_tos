<?php

    namespace InteractiveTOS\CMSBundle\Controller {

        use Symfony\Bundle\FrameworkBundle\Controller\Controller;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

        /**
         * Class WebController
         * @package InteractiveTOS\CMSBundle\Controller
         *
         * @Route("/")
         * @Template()
         */
        class WebController extends Controller {
            /**
             * @Route("/", name="web.index")
             */
            public function indexAction() {
                return array();
            }
        }

    }

?>