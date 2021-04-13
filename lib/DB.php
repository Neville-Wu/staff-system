<?php

/**
 * Class DB
 *
 * Database operation assistant
 */
class DB
{
    protected static $instance = null;
    protected static $sql = '';
    protected static $values = [];

    /**
     * Entrance for connecting database
     * @return PDO|null
     */
    public static function instance()
    {
        $connect = include_once(DB_CONFIG);
        $db = $connect['connections'][$connect['default']['connections']];

        if (self::$instance === null)
        {
            try {
                $opt  = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                    PDO::ATTR_EMULATE_PREPARES => FALSE,
                ];
                $dsn = 'mysql:host='.$db['host'].';port='.$db['port'].';dbname='.$db['dbname'].';charset='.$db['charset'];
                self::$instance = new PDO($dsn, $db['username'], $db['password'], $opt);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    /**
     * Execute SQL for query
     * @param $sql
     * @param array $args
     * @return bool|false|PDOStatement
     */
    public static function run($sql, $args = [])
    {
        $self = self::instance();
        if (!$args)
        {
            $run = $self->query($sql);
            self::getError();
            return $run;
        }
        $stmt = $self->prepare($sql);
        self::getError();
        $stmt->execute($args);
        return $stmt;
    }

    /**
     * Insert a record
     * @param $table
     * @param $values
     * @return bool|false|PDOStatement
     */
    public static function insert($table, $values)
    {
        $key = "";
        $val = "";
        $arr = [];
        foreach ($values as $k => $v) {
            $key .= "`$k`,";
            $val .= ":$k,";
            $arr[":$k"] = $v;
        }
        $key = rtrim($key,',');
        $val = rtrim($val,',');
        return self::run("INSERT INTO $table ($key) VALUES ($val)", $arr);
    }

    /**
     * Update a record
     * @param $table
     * @param $values
     * @param $id
     * @return bool|false|PDOStatement
     */
    public static function update($table, $values, $id)
    {
        $str = "";
        $arr = [];
        foreach ($values as $k => $v) {
            $str .= "`$k`=:$k,";
            $arr[":$k"] = $v;
        }
        $str = rtrim($str,',');
        return self::run("UPDATE $table SET $str WHERE $id", $arr);
    }

    /**
     * Delete a record
     * @param $table
     * @param $id
     * @return bool|false|PDOStatement
     */
    public static function delete($table, $id)
    {
        return self::run("DELETE FROM $table WHERE $id");
    }

    /**
     * Get table
     * @param $table
     * @param string $key
     * @return DB
     */
    public static function table($table, $key='*')
    {
        self::$sql = "select $key from $table";
        return new self;
    }

    /**
     * Condition for selecting data like where, group, order by
     * @param string $sql
     * @param array $values
     * @return DB
     */
    public function condition($sql = '', $values = [])
    {
        if ($sql != '') {
            self::$sql .= ' ' . $sql;
            self::$values = $values;
        }
        return new self;
    }

    /**
     * Get all records
     * @param int $type
     * @return array
     */
    public function all($type = false)
    {
        if ($type) {
            return self::run(self::$sql, self::$values)->fetchAll($type);
        } else {
            return self::run(self::$sql, self::$values)->fetchAll();
        }
    }

    /**
     * Get one record
     * @param int $type
     * @return mixed
     */
    public function one($type = false)
    {
        if ($type) {
            return self::run(self::$sql, self::$values)->fetch($type);
        } else {
            return self::run(self::$sql, self::$values)->fetch();
        }
    }


    /**
     * Catch PDO errors
     * @throws Exception
     */
    private static function getError()
    {
        if (self::instance()->errorCode() != '00000') {
            $arrayError = self::instance()->errorInfo();
            self::outputError($arrayError[2]);
        }
    }

    /**
     * Output error
     * @param $strErrMsg
     * @throws Exception
     */
    private static function outputError($strErrMsg)
    {
        die(new Exception('MySQL Error: ' . $strErrMsg));
    }

}
