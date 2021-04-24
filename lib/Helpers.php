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
     * @param string $url : a url which you want to jump on. (e.g user/index)
     * @param string $arr : an array of param passing value. (e.g ['param'=>'value'])
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
     * @param string $url : a url which you want to jump on. (e.g user/index)
     * @param $alert : a message you want to pop up on the page. (e.g 'Successful login')
     * @param string $arr : an array of param passing value. (e.g ['param'=>'value'])
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
     * Rendering page, css and js file
     * @param array $url : a url which you want to jump on. (e.g user/index)
     * @param array $arr : an array of param passing value. (e.g ['param'=>'value'])
     * @param array $css : an array of css link for loading css file. (e.g ['assets/css/style.css'])
     * @param array $js : an array of js link for loading js file. (e.g ['assets/js/script.js'])
     * @param bool $layout : if false, will load main.php (layout frame). if true, will not load main.php
     */
    public static function render($url, $arr = [], $css = [], $js = [], $layout = false)
    {
        if (count($arr)) {
            foreach ($arr as $k => $v) {
                ${$k} = $v;
            }
        }
        if ($layout == false) {
            include_once 'view/layout/main.php';
        } else {
            include_once $url;
        }
    }


    /**
     * Return a URL after formatting
     * @param $url : a url which you want to jump on. (e.g user/index)
     * @param string $arr : an array of param passing value. (e.g ['param'=>'value'])
     * @return string : return a url
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
     * User access authority
     * @param string $role : a role value (e.g staff, manager)
     * @return bool : return true or false
     */
    public static function access($role = '')
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