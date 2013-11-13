<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Factory\Listener\Back;

use ScContent\Listener\Back\ContentListRecoveryFromTrash,
    //
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class ContentListRecoveryFromTrashFactory implements FactoryInterface
{
    /**
     * @param Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return ScContent\Listener\Back\ContentListRecoveryFromTrash
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $translator = $serviceLocator->get('translator');
        $optionsProvider = $serviceLocator->get(
            'sc-service.back.content.list.options.provider'
        );
        $mapper = $serviceLocator->get(
            'sc-mapper.back.content.list.toggle.trash'
        );

        $listener = new ContentListRecoveryFromTrash();

        $listener->setTranslator($translator);
        $listener->setOptionsProvider($optionsProvider);
        $listener->setMapper($mapper);

        $events = $listener->getEventManager();
        $events->attach(
            'process.recovery',
            function($event) use ($serviceLocator) {
                $layoutListener = $serviceLocator->get(
                    'sc-listener.back.layout'
                );
                $layoutListener->contentRelocated($event);
            }
        );

        return $listener;
    }
}