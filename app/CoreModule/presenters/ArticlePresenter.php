<?php

namespace App\CoreModule\Presenters;

use App\CoreModule\Forms\ArticleFormFactory;
use App\CoreModule\Model\ArticleManager;
use Nette\Application\UI\Form;


class ArticlePresenter extends BasePresenter
{

    /** @var  ArticleFormFactory */
    private $articleFormFactory;


    /** @var ArticleManager */
    private $articleManager;

    /**
     * @param ArticleFormFactory $articleFormFactory
     * @param ArticleManager $articleManager
     */
    public function __construct(ArticleFormFactory $articleFormFactory, ArticleManager $articleManager)
    {
        parent::__construct();
        $this->articleFormFactory = $articleFormFactory;
        $this->articleManager = $articleManager;
    }

    public function renderDefault()
    {
        $articles = $this->articleManager->getArticles();
        $this->template->articles = $articles;
    }

    public function renderDetail($id)
    {
        if (!($article = $this->articleManager->getArticle($id)))
            $this->error(); // Vyhazuje výjimku BadRequestException.

        $this->template->article = $article;
    }

    public function renderAdd()
    {
        
    }

    public function actionEdit($id)
    {
        $article = $this->articleManager->getArticle($id);
        $this['articleForm']->setDefaults($article);
        
    }

    protected function createComponentArticleForm()
    {
        $form = $this->articleFormFactory->create();
        $form->onSuccess[] = [$this, 'articleFormSucceeded'];

        return $form;
    }

    public function articleFormSucceeded(Form $form, \stdClass $values)
    {
        if(empty($values->id)) {
            $article = $this->articleManager->addArticle($values);
            if($article) {
                $this->flashMessage('Článek byl úspěšně publikován.', 'success');
            } else {
                $this->flashMessage('Nepodařilo se vložit nový článek', 'error');
            }

        } else {
            $numRows = $this->articleManager->editArticle($values);
            if($numRows) {
                $this->flashMessage('Článek byl úspěšně editován.', 'success');
            } else {
                $this->flashMessage('Článek se nepodařilo uložit', 'error');
            }
        }

        $this->redirect('default');
    }


}