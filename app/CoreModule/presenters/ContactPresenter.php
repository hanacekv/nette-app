<?php

namespace App\CoreModule\Presenters;

use App\CoreModule\Forms\ContactFormFactory;
use Nette\Application\UI\Form;

class ContactPresenter extends BasePresenter
{

    /**
     * @var ContactFormFactory
     */
    private $contactFormFactory;

    /**
     * @param ContactFormFactory $contactFormFactory
     */
    public function __construct(ContactFormFactory $contactFormFactory)
    {
        $this->contactFormFactory = $contactFormFactory;
    }


    public function renderDefault()
    {
        
    }

    protected function createComponentContactForm()
    {
        $form = $this->contactFormFactory->create();
        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        return $form;
    }

    public function contactFormSucceeded(Form $form, \stdClass $values)
    {
        // TODO ODESLÁNÍ EMAILU A ULOŽENÍ DO DB


        $this->flashMessage('Vaše zpráva byla úspěšně odeslána.', 'success');
        $this->redirect('this');

    }
}