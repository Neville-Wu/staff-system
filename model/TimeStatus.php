<?php

class TimeStatus extends DB
{
    public static $table_name = 'time_status';

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }

    public static function insert($user_id = '', $start_time = '', $end_time = '', $description = '')
    {
        if ($start_time <= $end_time && $description != '') {
            return DB::insert(self::$table_name, ['user_id' => $user_id, 'start_time' => $start_time, 'end_time' => $end_time, 'description' => $description]);
        }
        return null;
    }

}