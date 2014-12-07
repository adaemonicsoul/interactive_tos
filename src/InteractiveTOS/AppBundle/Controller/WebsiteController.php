<?php


    namespace InteractiveTOS\AppBundle\Controller {


        use InteractiveTOS\AppBundle\Form\WebsiteType;
        use InteractiveTOS\AppBundle\Form\WebsiteView;
        use InteractiveTOS\BusinessBundle\Dao\WebsiteDao;
        use InteractiveTOS\BusinessBundle\Dao\WebsiteSearchContext;
        use InteractiveTOS\BusinessBundle\Entity\Website;
        use Symfony\Bundle\FrameworkBundle\Controller\Controller;
        use Symfony\Component\HttpFoundation\Request;

        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

        /**
         * Class WebsiteController
         * @package InteractiveTOS\AppBundle\Controller
         * @Template()
         * @Route("/websites")
         */
        class WebsiteController extends Controller {
            /**
             * @return \InteractiveTOS\BusinessBundle\Entity\Tos[]
             * @Route("/", name="website.list")
             */
            public function listAction() {
                /** @var WebsiteDao $websiteDao */
                $websiteDao = $this->get("interactivetos.dao.website");

                return $websiteDao->search(new WebsiteSearchContext());
            }

            /**
             * @param Request $request
             *
             * @return array
             * @Route("/new", name="website.new")
             */
            public function newAction(Request $request) {
                return $this->editAction(new Website(), $request);
            }


            /**
             * @Route("/{id}", name="website.edit")
             * @param Website $website
             * @param Request $request
             *
             * @return array
             */
            public function editAction(Website $website, Request $request) {
                $form = $this->createForm(new WebsiteType(), new WebsiteView($website));
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $websiteView = $form->getData();
                    if ($websiteView instanceof WebsiteView) {
                        $website->setAddress($websiteView->getAddress());

                        /** @var WebsiteDao $websiteDao */
                        $websiteDao = $this->get("interactivetos.dao.website");
                        $websiteDao->save($website);

                        return $this->redirect($this->generateUrl('website.list', array('websiteId' => $website->getId())));
                    }
                }

                return array(
                    'form'    => $form->createView(),
                    'website' => $website
                );
            }

            public function deleteAction(Website $website){
                /** @var WebsiteDao $websiteDao */
                $websiteDao = $this->get("interactivetos.dao.website");
                $websiteDao->delete($website);

                return $this->redirect($this->generateUrl('website.list'));
            }
        }
    }
 