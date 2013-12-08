<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Form\Back;

use Zend\Db\Adapter\AdapterInterface,
    Zend\Validator\Db\AbstractDb,
    Zend\Form\Form;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class ArticleForm extends Form
{
    /**
     * @var Zend\Db\Adapter\AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;

        parent::__construct('article');
        $this->setFormSpecification()->setInputSpecification();
    }

    /**
     * @return ArticleForm
     */
    protected function setFormSpecification()
    {
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Title',
                'required'    => 'required',
                'class'       => 'form-control input-lg',
            ],
        ]);

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Name',
                'required'    => 'required',
                'class'       => 'form-control input-sm',
            ],
            'options' => [
                'label' => 'Article Name',
            ],
        ]);

        $this->add([
            'name' => 'content',
            'type' => 'textarea',
            'options' => [
                'label' => 'Article content',
                'label_attributes' => [
                    'class' => 'content-form-label'
                ],
            ],
            'attributes' => [
                'id' => 'content',
                'class' => 'form-control',
                'rows'  => 14,
            ],
        ]);

        $this->add([
            'name' => 'status',
            'type' => 'select',
            'options' => [
                'label' => 'Status',
                'value_options' => [
                    'published' => 'Published',
                    'draft' => 'Draft',
                ],
            ],
            'attributes' => [
                'id' => 'status',
                'class' => 'form-control',
            ],
        ]);

        $this->add(array(
            'name' => 'save',
            'type' => 'button',
            'options' => array(
                'label' => 'Save',
            ),
            'attributes' => array(
                'type'  => 'submit',
                'class' => 'btn btn-primary',
                'value' => 'save',
            ),
        ));

        return $this;
    }

    /**
     * @return ArticleForm
     */
    protected function setInputSpecification()
    {
        $spec = $this->getInputFilter();

        $spec->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 255,
                        'encoding' => 'utf-8',
                    ],
                ],
            ],
        ]);

        $spec->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 255,
                        'encoding' => 'utf-8',
                    ],
                ],
                [
                    'name' => 'DbNoRecordExists',
                    'options' => [
                        'adapter' => $this->adapter,
                        'table' => 'sc_content',
                        'field' => 'name',
                        'messages' => [
                            AbstractDb::ERROR_RECORD_FOUND => "The name '%value%' already exists.",
                        ],
                    ],
                ],
            ],
        ]);

        return $this;
    }
}
