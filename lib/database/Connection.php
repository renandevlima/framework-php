<?php

namespace Database;

abstract class Connection
{
  private static $conn;

  public static function getConn()
  {
    global $env;

    if (!self::$conn) {
      self::$conn = new \PDO("mysql:host={$env["database_host"]}; dbname={$env["database_name"]};", $env["database_login"], $env["database_pass"]);
      self::$conn->exec("SET CHARACTER SET utf8");
    }

    return self::$conn;
  }
}
