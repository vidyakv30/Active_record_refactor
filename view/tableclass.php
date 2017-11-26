<?php
    /*
    * Class to prepare HTML table definition
    */
    class tableClass
    {

        private static $table;
     
     /*
    * Method to select the action to be performed based on the count
    */
        public static function populateTable($rec)
        {
            self::$table = "";
            if (count($rec) == 0) {
                self::$table .= "<b> No records returned from table <b> <br>";
            } else {

                self::drawTable($rec);

            }
            return self::$table;

        }
     /*
    * Method to  create the HTML table
    */
        private static function drawTable($rec)
        {

            self::$table .= '<table>';
            self::$table .= '<tr>';
            $headerFields = $rec[0];
            foreach ($headerFields as $key => $value) {
                self::$table .= "<th>$key</th>";

            }
            self::$table .= '</tr>';
            foreach ($rec as $row) {
                self::$table .= '<tr>';

                foreach ($row as $key => $value) {
                    self::$table .= "<td>$value</td>";

                }
                self::$table .= '</tr>';

            }

            self::$table .= '</table> <br>';

        }

    }
   ?>