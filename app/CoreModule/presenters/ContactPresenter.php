<?php

namespace App\CoreModule\Presenters;

use App\CoreModule\Forms\ContactFormFactory;

class ContactPresenter extends BasePresenter
{

    public function renderDefault()
    {
        
    }

    protected function createComponentContactForm()
    {
        $form = (new ContactFormFactory)->create();

        return $form;
    }
}