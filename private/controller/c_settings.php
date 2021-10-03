<?php
session_start();// because ajax?

function addSector($title, $parentID = NULL ){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("INSERT INTO sectors (title,parent_id) VALUES (?,?)");
    $stmt->bind_param("si", $title, $parentID);
    $stmt->execute();
    $ret->sector_id=$stmt->insert_id;
    
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

function loadSector($sectorID){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("SELECT * FROM sectors WHERE sector_id=?");
    $stmt->bind_param("i",$sectorID);
    $stmt->execute();
    $result = $stmt->get_result();
    $ret->data = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

if (isset($_POST['addSector'])) {
    $ret = addSector($_POST['title']);
    echo json_encode( $ret );
} elseif (isset($_POST['loadSector'])) {
    $ret = addSector($_POST['sector_id']);
    echo json_encode( $ret );
} elseif (isset($_POST['updateSector'])) {

}
