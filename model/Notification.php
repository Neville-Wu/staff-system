<?php

class Notification extends DB
{
    public static $table_name = 'notification';


    /**
     * @param string $id
     * @return DB
     */
    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }


    /**
     * Get unread notifications
     * @return array
     */
    public static function getUnreadNote()
    {
        return self::table(self::$table_name)
            ->condition('where status="unread" and user_id=' . $_SESSION['user']['id'])
            ->all();
    }


    /**
     * Send notification
     * @param $data
     * @return bool|false|PDOStatement
     */
    public static function sendMessage($data)
    {
        return DB::insert(self::$table_name, $data);
    }

}