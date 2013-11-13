<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Entity\Back;

use ScContent\Entity\AbstractEntity;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class WidgetItem extends AbstractEntity
{
    /**
     * @var integer | null
     */
    protected $id;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $displayName = '';

    /**
     * @var string
     */
    protected $region = '';

    /**
     * @var integer
     */
    protected $position = 0;

    /**
     * @param integer $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setDisplayName($name)
    {
        $this->displayName = $name;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        if (! $this->displayName) {
            return $this->name;
        }
        return $this->displayName;
    }

    /**
     * @param string $region
     * @return void
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param integer $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = (int) $position;
    }

    /**
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }
}