<?php

     /*
    * Template Class  to output  the results
    */
    class output
    {
        private $header;
        private $message;
        private $table;

        public function printResults()
        {
            echo "<h2> $this->header </h2>";
            echo "$this->message <br>";
            echo "$this->table";
            echo ("<hr>");
        }

    /*
    * Method to generate the table based on the action performed and the resulting data.
    */
        public function templateGenerator($action, $messageVar, $tableData)
        {
            $this->table = $tableData;
            switch ($action) {
                case 'INSERT':{
                        $arrays        = get_object_vars($messageVar);
                        $this->header  = "<h2>Insert New Record</h2>";
                        $this->message = "Inserted New Record with Data: ";
                        foreach ($arrays as $key => $value) {
                            if($key!= "id"){
                            $this->message .= "$key = $value ";
                         }
                        }
                        break;
                    }
                case 'UPDATE':{
                        $this->header  = "<h2>Update Record</h2>";
                        $this->message = "Update Record with Id: $messageVar";
                        break;
                    }
                case 'SELECTALL':{
                        $this->header  = "<h2>Select All Records</h2>";
                        $this->message = "Select ALL Records";
                        break;

                    }
                case 'SELECT':{

                        $this->header  = "<h2>Select One Record</h2>";
                        $this->message = "Select Record with Id: $messageVar";
                        break;
                    }
                case 'DELETE':{
                        $this->header  = "<h2>Delete Record</h2>";
                        $this->message = "Delete Record with Id: $messageVar";
                    }
                default:

                    break;
            }

        }
    }
?>