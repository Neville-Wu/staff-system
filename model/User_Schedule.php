<?php

class User_Schedule extends DB
{
    public static $table_name = 'user_schedule';

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }

    public static function insert($user_id = '', $schedule_id = '')
    {
        if ($start_time <= $end_time && $location != '') {
            return DB::insert(self::$table_name, ['user_id' => $user_id, 'schedule_id' => $schedule_id]);
        }
        return null;
    }

    public static function getAllocateSchedule($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('join schedule on schedule.id=schedule_id where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }

}