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

    public static function getAllocateStaff($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('join user on user.id=user_id where mode="activated" and schedule_id=' . $id);
        }
        return self::table(self::$table_name);
    }

    public static function allocate($post)
    {
        return DB::insert(self::$table_name, ['user_id' => $post['u_id'], 'schedule_id' => $post['s_id']]);
    }

    public static function getRemainHours()
    {
        return self::table(self::$table_name, 'user_id, SUM(TIMESTAMPDIFF(HOUR,start_time,end_time)) AS hours')
            ->condition('join schedule on schedule.id=schedule_id where status="Accepted" group by user_id');
    }

}