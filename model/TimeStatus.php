<?php

class TimeStatus extends DB
{
    public static $table_name = 'time_status';


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
     * Add unavailable time
     * @param string $user_id
     * @param string $start_time
     * @param string $end_time
     * @param string $description
     * @return bool|false|PDOStatement|null
     */
    public static function insert($user_id = '', $start_time = '', $end_time = '', $description = '')
    {
        if ($start_time <= $end_time && $description != '') {
            return DB::insert(self::$table_name, ['user_id' => $user_id, 'start_time' => $start_time, 'end_time' => $end_time, 'description' => $description]);
        }
        return null;
    }


    /**
     * Searching all staffs that are available
     * @return DB
     */
    public static function getAvailableStaff()
    {
        return self::table(self::$table_name)->condition('right join user on user_id=user.id where role="staff" and mode="activated"');
    }

}