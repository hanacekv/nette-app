<?php declare(strict_types=1);

namespace App\CoreModule\Model;

use Nette\Utils\ArrayHash;

class ArticleManager extends DatabaseManager
{
    const
        TABLE_NAME = 'article',
        COLUMN_ID = 'id';


    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID . ' DESC');
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getArticle(int $id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    /**
     * @param ArrayHash $article
     * @return bool|int|\Nette\Database\Table\ActiveRow
     */
    public function addArticle(ArrayHash $article)
    {
        unset($article[self::COLUMN_ID]);
        $article['published'] = date("Y-m-d H:i:s");
        return $this->database->table(self::TABLE_NAME)->insert($article);
    }

    /**
     * @param ArrayHash $article
     * @return int
     */
    public function editArticle(ArrayHash $article)
    {
        $article['lastUpdate'] = date("Y-m-d H:i:s");
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $article[self::COLUMN_ID])->update($article);
    }

    /**
     * @param int $id
     */
    public function removeArticle(int $id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}