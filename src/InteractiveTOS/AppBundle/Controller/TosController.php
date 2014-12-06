<?php


    namespace InteractiveTOS\AppBundle\Controller {


        use InteractiveTOS\AppBundle\Form\TosView;
        use InteractiveTOS\AppBundle\Form\TosType;
        use InteractiveTOS\BusinessBundle\Dao\TosDao;
        use InteractiveTOS\BusinessBundle\Entity\Tos;
        use InteractiveTOS\BusinessBundle\Service\TosService;
        use Symfony\Bundle\FrameworkBundle\Controller\Controller;
        use Symfony\Component\HttpFoundation\Request;

        /**
         * Class TosController
         * @package InteractiveTOS\AppBundle\Controller
         * @Template()
         */
        class TosController extends Controller {
            /**
             * @Route("/tos", name="editTos")
             * @param Tos     $tos
             * @param Request $request
             *
             * @return array
             */
            public function editAction(Tos $tos, Request $request){
                /** @var TosService $tosService */
                $tosService = $this->get("interactivetos.service.tos");

                $form = $this->createForm(new TosType(), new TosView($tos));
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $tosProfile = $form->getData();
                    if($tosProfile instanceof TosView){
                    $tos = $tosService->createTos($tosProfile->getTitle(),$tosProfile->getText(), $tosProfile->getUser());
                        /** @var TosDao $tosDao */
                        $tosDao = $this->get("interactivetos.dao.tos");
                        $tosDao->save($tos);
                    }
                }

                return array(
                    'form' => $form->createView(),
                    'tos' => $tos
                );
            }
        }


    }

 