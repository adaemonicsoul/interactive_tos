<?php


    namespace InteractiveTOS\AppBundle\Controller {


        use InteractiveTOS\AppBundle\Form\TosView;
        use InteractiveTOS\AppBundle\Form\TosType;
        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Entity\Website;
        use InteractiveTOS\BusinessBundle\Service\TosService;
        use Symfony\Bundle\FrameworkBundle\Controller\Controller;
        use Symfony\Component\HttpFoundation\Request;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
        use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
             */
            public function listAction(Website $website) {

            }

            /**
             * @param Website $website
             * @param Request $request
             *
             * @return array
             * @Route("/new", name="tos.new")
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
                        $items = $tosService->createTosItems($tosView->getText());
                        $tos->setTosItems($items);
                        $tos->setWebsite($website);
                        $tos->setTitle($tosView->getTitle());

                        $tosService->save($tos);
                    }
                }

                return array(
                    'form' => $form->createView(),
                    'tos'  => $tos
                );
            }
        }


    }

 