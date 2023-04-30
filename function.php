<?php

include "db_connection.php";


function getUsersData($id) {
    
    $array = array();
    
    $table_query = "SELECT * FROM users WHERE ID = '$id'";

    $table_result = mysqli_query($con,$table_query);
    
    while ($r = mysqli_fetch_assoc($table_result)){
        $array['ID'] = $r['ID'];
        $array['Firstname'] = $r['Firstname'];
        $array['Lastname'] = $r['Lastname'];
        $array['Email'] = $r['Email'];
        $array['Gender'] = $r['Gender'];
        $array['Birthday'] = $r['Birthday'];
        $array['PhoneNo'] = $r['PhoneNo'];
        $array['Address'] = $r['Address'];
        return $array;
    }
    
}

    
function getId($username){
            
                    $table_query = "SELECT ID FROM users WHERE Email = '$username'";

                    $table_result = mysqli_query($con,$table_query); 
       
                    while ($r = mysqli_fetch_assoc($q_result)){
                    return $r['ID'];
                
            }
    
}
    

?>      
















