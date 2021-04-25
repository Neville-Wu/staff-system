<?php

class Schedule extends DB
{
    public static $table_name = 'schedule';

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where id='.$id);
        }
        return self::table(self::$table_name);
    }

    public static function insert($start_time = '', $end_time = '', $location = '')
    {
        if($start_time <= $end_time && $location != ''){
            return DB::insert(self::$table_name, ['start_time' => $start_time, 'end_time' => $end_time, 'location' => $location]);
        }
        return null;
    }
}