<?php
    require_once "utility.php" ;
    class Cache {
        private static $email , $username , $password ;
        public static function write_static ($e , $u , $p) {
            self::$email = $e ;
            self::$username = $u ;
            self::$password = $p ;
        }
        public static function print_static () {
            echo self::$email ;
            echo self::$username ;
            echo self::$password ;
        }
        public static function get_static () {
            return self::$email ;
        }
        public static function writ_static ($e) {
            self::$email = $e ;
        }
    }
?>