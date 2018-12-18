<?php
declare(strict_types=1);

namespace App\CoreModule\Forms;

use Nette\SmartObject;
use App\CoreModule\Forms\FormFactory;

class ContactFormFactory
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

        $form->addText('name', 'Vaše jméno:')
            ->setRequired('Prosím zadejte Vaše jméno.');
        $form->addEmail('email', 'Váš email:')
            ->setEmptyValue('@')
            ->setRequired('Prosím zadejte Váš email.');
        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Prosím zadejte text zprávy.');

        $form->addSubmit('send', 'Odeslat');

        return $form;
    }
}