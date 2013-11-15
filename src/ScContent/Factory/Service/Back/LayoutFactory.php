<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Factory\Service\Back;

use ScContent\Service\Back\LayoutService,
    //
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class LayoutFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $translator = $serviceLocator->get('translator');
        $moduleOptions = $serviceLocator->get('sc-options.module');
        $layoutMapper = $serviceLocator->get('sc-mapper.back.layout.service');

        $service = new LayoutService();

        $service->setTranslator($translator);
        $service->setModuleOptions($moduleOptions);
        $service->setLayoutMapper($layoutMapper);
        return $service;
    }
}
