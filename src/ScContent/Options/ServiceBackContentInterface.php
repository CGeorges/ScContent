<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Options;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
interface ServiceBackContentInterface
{
    /**
     * @param string $class
     * @return void
     */
    function setEntityBackCategoryClass($name);

    /**
     * @return string
     */
    function getEntityBackCategoryClass();

    /**
     * @param string $class
     * @return void
     */
    function setEntityBackArticleClass($name);

    /**
     * @return string
     */
    function getEntityBackArticleClass();

    /**
     * @param string $class
     * @return void
     */
    function setEntityBackFileClass($name);

    /**
     * @return string
     */
    function getEntityBackFileClass();
}