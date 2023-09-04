<?php 



    
    
    function GetOptions($AllData,$conn, $DataName,$ValueName,$NameColumn,string  $DbValueColumnName,
                        string $DbNameColumn , string $tableName){

        $AllData = $conn->query("SELECT * FROM $tableName ");

        foreach($AllData as $DataName ){

            $ValueName = $DataName[$DbValueColumnName];
            $NameColumn = $DataName[$DbNameColumn];

            echo "<option value = '$ValueName' > '$NameColumn' </option>";

        }


    } 
    
    function ValidateData($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);


        return $data;



    }
    
 
    
    ?>




