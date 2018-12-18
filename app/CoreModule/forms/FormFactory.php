<?php
declare(strict_types=1);

namespace App\CoreModule\Forms;

use Nette\SmartObject;
use Nette\Application\UI\Form;
use AlesWita\FormRenderer\BootstrapV4Renderer;

class FormFactory
{
    use SmartObject;

    public function create()
    {
        $form = new Form();
        $form->setRenderer(new BootstrapV4Renderer);

        return $form;
    }
}