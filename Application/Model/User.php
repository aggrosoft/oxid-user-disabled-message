<?php

namespace Aggrosoft\UserDisabledMessage\Application\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\UserException;

class User extends User_parent
{
    public function login($userName, $password, $setSessionCookie = false)
    {
        $this->checkUserDisabled($userName);

        return parent::login($userName, $password, $setSessionCookie);
    }

    public function checkUserDisabled($userName)
    {
        $database = DatabaseProvider::getDb();
        $userNameCondition = 'oxuser.oxusername = ' . $database->quote($userName);

        $query = "SELECT `OXACTIVE`
                    FROM oxuser
                    WHERE 1
                    AND $userNameCondition
                    AND oxuser.oxpassword != ''";

        $active = $database->getOne($query);

        if (!$active) {
            throw oxNew(UserException::class, 'ERROR_MESSAGE_USER_DISABLED');
        }
    }
}