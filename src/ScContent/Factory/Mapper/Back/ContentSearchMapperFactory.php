<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Factory\Mapper\Back;

use ScContent\Mapper\Back\ContentSearchMapper,
    //
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class ContentSearchMapperFactory implements FactoryInterface
{
    /**
     * @param Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return ScContent\Mapper\Back\ContentSearchMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('sc-db.adapter');
        $optionsProvider = $serviceLocator->get(
            'sc-service.back.content.list.options.provider'
        );
        $mapper = new ContentSearchMapper($adapter, $optionsProvider);
        return $mapper;
    }
}