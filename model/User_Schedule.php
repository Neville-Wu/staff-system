<?php

class User_Schedule extends DB
{
    public static $table_name = 'user_schedule';


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
     * Get allocated schedule
     * @param string $id
     * @return DB
     */
    public static function getAllocateSchedule($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('join schedule on schedule.id=schedule_id where user_id=' . $id);
        }
        return self::table(self::$table_name);
    }


    /**
     * Get allocated staffs
     * @param string $id
     * @return DB
     */
    public static function getAllocateStaff($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('join user on user.id=user_id where mode="activated" and schedule_id=' . $id);
        }
        return self::table(self::$table_name);
    }


    /**
     * Allocate a staff to a schedule
     * @param $post
     * @return bool|false|PDOStatement
     */
    public static function allocate($post)
    {
        return DB::insert(self::$table_name, ['user_id' => $post['u_id'], 'schedule_id' => $post['s_id']]);
    }


    /**
     * Get remain hours
     * @return DB
     */
    public static function getRemainHours()
    {
        return self::table(self::$table_name, 'user_id, SUM(TIMESTAMPDIFF(HOUR,start_time,end_time)) AS hours')
            ->condition('join schedule on schedule.id=schedule_id where status="Accepted" group by user_id');
    }

}