<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreBundle\Event;

class ImmediatEventStoreEvent extends AbstractEventStoreEvent
{
    const NAME = 'event_store.send';
}
