<?php
   /* 
    *Abstrcat class  to select record(s) from a table
    */
    abstract class collection
    {
    /*
    * Method to retrieve records in a table
    */
        public static function getRecordSet()
        {
            $db        = dbConn::getConnection();
            $tableName = get_called_class();
            $sql       = "SELECT * from " . $tableName;
            $statement = $db->prepare($sql);
            $statement->execute();
            $class = static::$modelName;
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $recordSet = $statement->fetchAll();
            return $recordSet;
        }
        /* 
        * Method to retrieve one record from table using ID
        */

        public static function getOneRecord($id)
        {
            $db        = dbConn::getConnection();
            $tableName = get_called_class();
            $sql       = "SELECT * from " . $tableName . " WHERE id = $id";
            $statement = $db->prepare($sql);
            $statement->execute();
            $class = static::$modelName;
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $record = $statement->fetchAll();
            return $record;
        }
    }
?>