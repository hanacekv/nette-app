<?php
declare(strict_types=1);

namespace App\CoreModule\Forms;

use Nette\SmartObject;
use App\CoreModule\Forms\FormFactory;

class ArticleFormFactory
{
    use SmartObject;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @param FormFactory $formFactory
     */
    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function create()
    {
        $form = $this->formFactory->create();

        $form->addHidden('id');
        $form->addText('title', 'Titulek:')
            ->setRequired('Zadejte prosím titulek článku.');
        $form->addText('slug', 'Slug:')
            ->setRequired('Zadejte prosím slug');
        $form->addText('perex', 'Perex:');
        $form->addTextArea('content', 'Text:')->setAttribute('rows', 15);

        $form->addSubmit('save', 'Uložit');

        return $form;
    }

}