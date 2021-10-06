<?php
session_start();// because ajax?

function addRecipe($title){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("INSERT INTO grub_recipes (title) VALUES (?)");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $ret->recipe_id=$stmt->insert_id;
    
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

function deleteRecipe($recipeID){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("DELETE FROM grub_recipes WHERE recipe_id=?");
    $stmt->bind_param("i",$recipeID);
    $stmt->execute();
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

function getRecipes($tags){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("SELECT * FROM grub_recipes");
    $stmt->execute();
    $result = $stmt->get_result();
    $ret->data = $result->fetch_all(MYSQLI_ASSOC);
    
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

function loadRecipe($recipeID){
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $stmt = $conn->prepare("SELECT * FROM grub_recipes WHERE recipe_id=?");
    $stmt->bind_param("i",$recipeID);
    $stmt->execute();
    $result = $stmt->get_result();
    $ret->data = $result->fetch_all(MYSQLI_ASSOC);
    
    $conn->close();

    return $ret;  //returns the second argument passed into the function
}

if (isset($_POST['addRecipe'])) {
    $ret = addRecipe($_POST['title']);
    echo json_encode( $ret );
} elseif (isset($_POST['deleteRecipe'])) {
    $ret = deleteRecipe($_POST['recipeID']);
    echo json_encode( $ret );
} elseif (isset($_POST['loadRecipe'])) {
    $ret = loadRecipe($_POST['recipeID']);
    echo json_encode( $ret );
} elseif (isset($_POST['getRecipes'])) {
    $ret = getRecipes($_POST['tags']);
    echo json_encode( $ret );
}