<?php

namespace App\CoreModule\Model;

use Nette\Database\Context;
use Nette\SmartObject;

abstract class DatabaseManager
{
    use SmartObject;

    /** @var Context */
    protected $database;

    /**
     * @param Context $database
     */
    public function __construct(Context $database)
    {
        $this->database = $database;
    }

}