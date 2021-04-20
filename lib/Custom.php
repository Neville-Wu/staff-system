<?php


class Custom
{
    public static function greeting()
    {
        if (date("H") < 12) {
            return "Good Morning";
        } elseif (date("H") > 11 && date("H") < 18) {
            return "good Afternoon";
        } elseif (date("H") > 17) {
            return "Good Evening";
        }
        return '';
    }
}