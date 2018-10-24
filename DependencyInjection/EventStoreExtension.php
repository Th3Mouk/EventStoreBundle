<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class EventStoreExtension extends ConfigurableExtension
{
    /**
     * Configures the passed container according to the merged configuration.
     *
     * @throws \Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $client = new Definition(
            'Th3Mouk\EventStoreClient\Client',
            [$mergedConfig['dsn']]
        );

        $container->setDefinition(
            'Th3Mouk\EventStoreClient\Client',
            $client
        );

        $container
            ->register(
                'Th3Mouk\EventStoreBundle\EventSubscriber\EventStoreSubscriber',
                'Th3Mouk\EventStoreBundle\EventSubscriber\EventStoreSubscriber'
            )
            ->addArgument($client)
            ->addTag('kernel.event_subscriber');
    }

    public function getAlias()
    {
        return 'eventstore';
    }
}
