<?php

declare(strict_types=1);

namespace App\CoreModule\Forms;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use AlesWita\FormRenderer\BootstrapV4Renderer;

class ArticleFormFactory
{
    public function create()
    {
        $form = new Form();
        $form->setRenderer(new BootstrapV4Renderer);

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