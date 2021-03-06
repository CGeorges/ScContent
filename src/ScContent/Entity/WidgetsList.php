<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013-2014 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Entity;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class WidgetsList extends AbstractList
{
    /**
     * @param  WidgetInterface $item
     * @return void
     */
    public function addItem(WidgetInterface $item)
    {
        $this->items[] = $item;
    }
}
