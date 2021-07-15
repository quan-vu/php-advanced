<?php

namespace App;

include "project.php";

use Project\Table as ProjectTable;   // as alias

class Table {

    public static function get(){
        echo "App.Table.get \n";
    }
}

// Run this line with: $ php ./namespaces/app.php
ProjectTable::get();
