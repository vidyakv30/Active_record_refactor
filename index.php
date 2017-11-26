    <?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    echo '<link rel="stylesheet" href="styles.css" type="text/css">';
   
   
    $outputArray = array();
    echo "<h1>'accounts' Table</h1>";


     /*
    * Method Calls to perform CRUD operations on accounts table
    */
    $records   = accounts::getRecordSet();
    $outputVar = new output();
    $outputVar->templateGenerator("SELECTALL", $records, tableClass::populateTable($records));
    array_push($outputArray, $outputVar);

    $id        = 11;
    $record    = accounts::getOneRecord($id);
    $outputVar = new output();
    $outputVar->templateGenerator('SELECT', $id, tableClass::populateTable($record));
    array_push($outputArray, $outputVar);

    $newAccount           = new account();
    $newAccount->email    = "janedoe121@gmail.com";+
    $newAccount->fname    = "Jane";
    $newAccount->lname    = "Doe";
    $newAccount->phone    = '007008';
    $newAccount->birthday = '19500101';
    $newAccount->gender   = 'female';
    $newAccount->password = '001002';
    $newID                = $newAccount->save();

    $insertedAccounts = accounts::getRecordSet();
    $outputVar        = new output();

    $outputVar->templateGenerator("INSERT", $newAccount, tableClass::populateTable($insertedAccounts));
    array_push($outputArray, $outputVar);

    $updateAccount        = new account();
    $updateAccount->id    = $newID;
    $updateAccount->email = "doe007@gmail.com";
    $updateAccount->save();

    $updatedAccounts = accounts::getRecordSet();
    $outputVar       = new output();
    $outputVar->templateGenerator("UPDATE", $newID, tableClass::populateTable($updatedAccounts));
    array_push($outputArray, $outputVar);

    $deleteAccount     = new account();
    $deleteAccount->id = $newID;
    $deleteAccount->delete();

    $deletedAccounts = accounts::getRecordSet();
    $outputVar       = new output();
    $outputVar->templateGenerator("DELETE", $newID, tableClass::populateTable($deletedAccounts));
    array_push($outputArray, $outputVar);

    foreach ($outputArray as $output) {
        $output->printResults();
    }

    /*
    * Resetting the output array to perform operation on todos table
    */

    $outputArray = array();
    echo "<h1>'todos' Table</h1>";

     /*
    * Method Calls to perform CRUD operations on accounts table
    */

    $todoRecords = todos::getRecordSet();
    $outputVar   = new output();
    $outputVar->templateGenerator("SELECTALL", $todoRecords, tableClass::populateTable($todoRecords));
    array_push($outputArray, $outputVar);

    $id         = 4;
    $todoRecord = todos::getOneRecord($id);
    $outputVar  = new output();
    $outputVar->templateGenerator('SELECT', $id, tableClass::populateTable($todoRecord));
    array_push($outputArray, $outputVar);

    $newTodo              = new todo();
    $newTodo->owneremail  = "janedoe121@gmail.com";+
    $newTodo->ownerid     = "02";
    $newTodo->createddate = "2017-11-20";
    $newTodo->duedate     = "2017-12-20";
    $newTodo->message     = 'Record inserted';
    $newTodo->isdone      = '0';
    $newTodoId            = $newTodo->save();

    $insertedTodos = todos::getRecordSet();
    $outputVar     = new output();
    $outputVar->templateGenerator("INSERT", $newTodo, tableClass::populateTable($insertedTodos));
    array_push($outputArray, $outputVar);

    $updateTodo          = new todo();
    $updateTodo->id      = $newTodoId;
    $updateTodo->message = "Record updated";
    $updateTodo->isdone  = '1';
    $updateTodo->save();

    $updatedTodos = todos::getRecordSet();
    $outputVar    = new output();
    $outputVar->templateGenerator("UPDATE", $newTodoId, tableClass::populateTable($updatedTodos));
    array_push($outputArray, $outputVar);

    $deleteTodo     = new todo();
    $deleteTodo->id = $newTodoId;
    $deleteTodo->delete();

    $deletedTodos = todos::getRecordSet();
    $outputVar    = new output();
    $outputVar->templateGenerator("DELETE", $newTodoId, tableClass::populateTable($deletedTodos));
    array_push($outputArray, $outputVar);

    foreach ($outputArray as $output) {
        $output->printResults();
    }
