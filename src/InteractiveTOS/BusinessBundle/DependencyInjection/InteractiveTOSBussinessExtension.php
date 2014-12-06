<?php

    namespace InteractiveTOS\BusinessBundle\DependencyInjection {

        use Symfony\Component\Config\FileLocator;
        use Symfony\Component\DependencyInjection\ContainerBuilder;
        use Symfony\Component\DependencyInjection\Extension\Extension;
        use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

        /**
         * Class InteractiveTOSBussinessExtension
         * @package InteractiveTOS\BusinessBundle\DependencyInjection
         */
        class InteractiveTOSBussinessExtension extends Extension {

            /**
             * Loads a specific configuration.
             *
             * @param array $config An array of configuration values
             * @param ContainerBuilder $container A ContainerBuilder instance
             *
             * @throws \InvalidArgumentException When provided tag is not defined in this extension
             *
             * @api
             */
            public function load(array $config, ContainerBuilder $container) {
                $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
                $loader->load('services.xml');
            }
        }

    }

?>