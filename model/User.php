<?php
/**
 * Created by PhpStorm.
 * User: Neville
 * Date: 6/05/2019
 * Time: 12:07 PM
 */

class User extends DB
{
    public static $table_name = 'a';

    public static $required = ['first_name', 'last_name', 'username', 'password'];

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where id='.$id);
        }
        return self::table(self::$table_name);
    }
}