<?php

class Notification extends DB
{
    public static $table_name = 'notification';

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }

    public static function sendMessage($data)
    {
        return DB::insert(self::$table_name, $data);
    }

}