<?php


namespace InteractiveTOS\AppBundle\Form{


    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;

    class WebsiteType extends AbstractType {

        /**
         * Returns the name of this type.
         *
         * @return string The name of this type
         */
        public function getName() {
            return 'interactivetos.website.websiteview';
        }

        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder->add('address', 'text', array('label' => 'website.address'));

            $builder->add('save', 'submit', array('label' => 'save'));
        }
    }


}

 