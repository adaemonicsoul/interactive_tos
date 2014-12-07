<?php


    namespace InteractiveTOS\AppBundle\Form {


        use Symfony\Component\Form\AbstractType;
        use Symfony\Component\Form\FormBuilderInterface;

        class TosType extends AbstractType {

            /**
             * Returns the name of this type.
             *
             * @return string The name of this type
             */
            public function getName() {
                return 'interactivetos_tos_tosview';
            }

            /**
             * @param FormBuilderInterface $builder
             * @param array $options
             */
            public function buildForm(FormBuilderInterface $builder, array $options) {
                $builder->add('title', 'text', array('label' => 'tos.title'));
                $builder->add('content', 'textarea', array('label' => 'tos.content'));

                $builder->add('save', 'submit', array('label' => 'save'));
            }
        }
    }

 