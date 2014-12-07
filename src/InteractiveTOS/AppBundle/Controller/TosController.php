<?php


    namespace InteractiveTOS\AppBundle\Controller {


        use InteractiveTOS\AppBundle\Form\TosType;
        use InteractiveTOS\AppBundle\Form\TosView;
        use InteractiveTOS\BusinessBundle\Dao\TosSearchContext;
        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\Website;
        use InteractiveTOS\BusinessBundle\Service\TosService;
        use Symfony\Bundle\FrameworkBundle\Controller\Controller;
        use Symfony\Component\HttpFoundation\Request;

        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

        /**
         * Class TosController
         * @package InteractiveTOS\AppBundle\Controller
         * @Template()
         * @Route("/{websiteId}/tos")
         * @ParamConverter("website", class="InteractiveTOSBusinessBundle:Website", options={"id" = "websiteId"})
         */
        class TosController extends Controller {
            /**
             * @Route("/", name="tos.list")
             * @param Website $website
             *
             * @return \InteractiveTOS\BusinessBundle\Entity\Tos[]
             */
            public function listAction(Website $website) {
                /** @var TosService $tosService */
                $tosService = $this->get("interactivetos.service.tos");
                $context = new TosSearchContext();

                $context->setWebsiteId($website->getId());
                $toses = $tosService->search($context);

                var_dump($website->getId());

                return array(
                    'toses' => $toses
                );
            }

            /**
             * @param Website $website
             * @param Request $request
             *
             * @return array
             * @Route("/new", name="tos.new")
             * @Template("InteractiveTOSAppBundle:Tos:edit.html.twig")
             */
            public function newAction(Website $website, Request $request) {
                $tos = new Tos();
                $tos->setWebsite($website);

                return $this->editAction($website, $tos, $request);
            }

            /**
             * @Route("/{id}", name="tos.edit")
             * @param Website $website
             * @param Tos $tos
             * @param Request $request
             *
             * @return array
             */
            public function editAction(Website $website, Tos $tos, Request $request) {
                /** @var TosService $tosService */
                $tosService = $this->get("interactivetos.service.tos");

                $form = $this->createForm(new TosType(), new TosView($tos));
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $tosView = $form->getData();
                    if ($tosView instanceof TosView) {
                        $items = $tosService->createTosItems($tosView->getContent());
                        foreach ($items as $item) {
                            $item->setTos($tos);
                        }

                        $tos->setTosItems($items);
                        $tos->setWebsite($website);
                        $tos->setTitle($tosView->getTitle());

                        $tosService->save($tos);

                        return $this->redirect($this->generateUrl('tos.list', array('websiteId' => $website->getId())));
                    }
                }

                return array(
                    'form' => $form->createView(),
                    'tos'  => $tos
                );
            }
        }
    }

 