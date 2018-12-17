<?php

declare(strict_types=1);

namespace App\CoreModule\Forms;

use Nette\Application\UI\Form;
use AlesWita\FormRenderer\BootstrapV4Renderer;

class ContactFormFactory
{
    public function create()
    {
        $form = new Form();
        $form->setRenderer(new BootstrapV4Renderer);

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