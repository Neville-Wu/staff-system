<?php
/**
 * Created by PhpStorm.
 * User: Neville
 * Date: 6/05/2019
 * Time: 12:07 PM
 */

class User extends DB
{
    public static $table_name = 'user';

//    public static $required = ['first_name', 'last_name', 'username', 'password'];

    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where id='.$id);
        }
        return self::table(self::$table_name);
    }

    public static function editProfile($arr, $id)
    {
        return DB::update(self::$table_name, $arr, 'id=' . $id);
    }

    public static function createAccount($email = '', $password = '', $full_name = '', $work_hours = '', $role = '')
    {
        return DB::insert(self::$table_name, ['email' => $email, 'password' => $password, 'full_name' => $full_name, 'work_hours' => $work_hours, 'role' => $role]);
    }

    public static function getNoteProcess()
    {
        return DB::table('user_schedule', '*, user_schedule.id s_id')
            ->condition('join schedule s on s.id=schedule_id where status="In Processing" and user_id=' . $_SESSION['user']['id'])
            ->all();
    }

    public static function getNoteAll()
    {
        return DB::table('user_schedule', '*, user_schedule.id s_id')
            ->condition('join schedule s on s.id=schedule_id where user_id=' . $_SESSION['user']['id'])
            ->all();
    }

    public static function setAllocationStatus($value)
    {
        return self::update(User_Schedule::$table_name, ['status' => $value['status']], 'id='.$value['id']);
    }
}