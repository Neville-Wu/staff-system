<?php


/**
 * Class Helpers
 *
 * To assist in providing some functionality
 */
class Helpers
{
    /**
     * HTTP header jumper
     * @param string $url
     * @param string $arr
     */
    public static function redirect($url = '', $arr = '')
    {
        $param = '';
        if ($arr) {
            foreach ($arr as $k => $v) {
                $param .= '&' . $k . '=' . urlencode($v);
            }
        }
        header('location:index.php?ctrl=' . $url . $param);
    }


    /**
     * Javascript alert message on screen
     * @param string $url
     * @param $alert
     * @param string $arr
     */
    public static function alert($url = '', $alert, $arr = '')
    {
        $param = '';
        if ($arr) {
            foreach ($arr as $k => $v) {
                $param .= '&' . $k . '=' . urlencode($v);
            }
        }
        echo "<script>
            alert('$alert');
            window.location.href='index.php?ctrl=".$url.$param."';
            </script>";
    }


    /**
     * Rendering page file
     * @param $url
     * @param string $arr
     */
    public static function render($url, $arr = '')
    {
        if ($arr) {
            foreach ($arr as $k => $v) {
                ${$k} = $v;
            }
        }
        include_once 'view/layout/main.php';
    }


    /**
     * URL formatter
     * @param $url
     * @param string $arr
     * @return string
     */
    public static function url($url, $arr = '')
    {
        $param = '';
        if ($arr) {
            foreach ($arr as $k => $v) {
                $param .= '&' . $k . '=' . urlencode($v);
            }
        }
        return 'index.php?ctrl=' . $url . $param;
    }


    /**
     * User sign in and role judgment
     * @param string $role
     * @return bool
     */
    public static function sess($role = '')
    {
        if (isset($_SESSION['user'])) {
            if($role == ''){return true;}
            if ($_SESSION['user']['role'] == $role) {
                return true;
            }
        }
        return false;
    }
}