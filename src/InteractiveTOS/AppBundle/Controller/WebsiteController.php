<?php


    namespace InteractiveTOS\AppBundle\Controller {


        use InteractiveTOS\AppBundle\Form\WebsiteType;
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
             * @Route("/", name="website.list")
             */
            public function listAction() {
                /** @var WebsiteDao $websiteDao */
                $websiteDao = $this->get('interactivetos.dao.website');

                $websites = $websiteDao->search(new WebsiteSearchContext());

                return array(
                    'websites' => $websites
                );
            }

            /**
             * @param Request $request
             *
             * @return array
             * @Route("/new", name="website.new")
             * @Template("InteractiveTOSAppBundle:Website:edit.html.twig")
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
                $form = $this->createForm(new WebsiteType(), $website);
                $form->handleRequest($request);
                if ($form->isValid()) {
                    /** @var WebsiteDao $websiteDao */
                    $websiteDao = $this->get("interactivetos.dao.website");
                    $websiteDao->save($website);

                    return $this->redirect($this->generateUrl('website.list', array()));
                }

                return array(
                    'form'    => $form->createView(),
                    'website' => $website
                );
            }

            /**
             * @param Website $website
             *
             * @Route("/delete/{id}", name="website.delete")
             *
             * @return \Symfony\Component\HttpFoundation\RedirectResponse
             */
            public function deleteAction(Website $website) {
                /** @var WebsiteDao $websiteDao */
                $websiteDao = $this->get("interactivetos.dao.website");
                $websiteDao->delete($website);

                return $this->redirect($this->generateUrl('website.list'));
            }
        }
    }
 