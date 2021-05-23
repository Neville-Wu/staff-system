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


    /**
     * @param string $id
     * @return DB
     */
    public static function get($id = '')
    {
        if ($id != '') {
            return self::table(self::$table_name)->condition('where id='.$id);
        }
        return self::table(self::$table_name);
    }


    /**
     * Change information in profile
     * @param $arr
     * @param $id
     * @return bool|false|PDOStatement
     */
    public static function editProfile($arr, $id)
    {
        return DB::update(self::$table_name, $arr, 'id=' . $id);
    }


    /**
     * Create account
     * @param string $email
     * @param string $password
     * @param string $full_name
     * @param string $work_hours
     * @param string $role
     * @return bool|false|PDOStatement
     */
    public static function createAccount($email = '', $password = '', $full_name = '', $work_hours = '', $role = '')
    {
        return DB::insert(self::$table_name, ['email' => $email, 'password' => $password, 'full_name' => $full_name, 'work_hours' => $work_hours, 'role' => $role]);
    }


    /**
     * Get notifications which are in processing
     * @return array
     */
    public static function getNoteProcess()
    {
        return DB::table('user_schedule', '*, user_schedule.id s_id')
            ->condition('join schedule s on s.id=schedule_id where status="In Processing" and user_id=' . $_SESSION['user']['id'])
            ->all();
    }


    /**
     * Get all notifications
     * @return array
     */
    public static function getNoteAll()
    {
        $scheduleMsg = DB::table('user_schedule', '*, user_schedule.id s_id')
            ->condition('join schedule s on s.id=schedule_id where user_id=' . $_SESSION['user']['id'])
            ->all();
        $notifi = DB::table('notification')
            ->condition('where user_id=' . $_SESSION['user']['id'])
            ->all();
        return [$scheduleMsg, $notifi];
    }


    /**
     * Set allocation status
     * @param $value
     * @return bool|false|PDOStatement
     */
    public static function setAllocationStatus($value)
    {
        return self::update(User_Schedule::$table_name, ['status' => $value['status']], 'id='.$value['id']);
    }


    /**
     * Mark notification as read
     * @param $id
     * @return bool|false|PDOStatement
     */
    public static function markRead($id)
    {
        return self::update(Notification::$table_name, ['status' => 'read'], 'id='.$id);
    }


    /**
     * Set account mode
     * @param $value
     * @return bool|false|PDOStatement
     */
    public static function setAccountMode($value)
    {
        return self::update(self::$table_name, ['mode' => $value['mode']], 'id=' . $value['id']);
    }
}