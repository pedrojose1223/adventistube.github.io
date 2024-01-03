<?php 

require './config.php';
require './functions.php';

session_start();
if (isLogged()){

$connect = connect($database);
if(!$connect){
    echo "Something Wrong";
}

$getType = clearGetData($_GET['type']);

if ($getType == 'movie') {
    
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $item = clearData($_POST['item']);
        $user = $_SESSION['user_email'];
                
        $statement = $connect->prepare("DELETE FROM movies_favorites WHERE item = :item AND user = :user");
        $statement->execute(array(
            'item' => $item,
            'user' => $user
        ));
        
        exit();

}

}elseif ($getType == 'serie') {

        $item = clearData($_POST['item']);
        $user = $_SESSION['user_email'];
                
        $statement = $connect->prepare("DELETE FROM series_favorites WHERE item = :item AND user = :user");
        $statement->execute(array(
            'item' => $item,
            'user' => $user
        ));
        
        exit();

}else{

    exit();
}

}else {

    echo "Something Wrong";
	
    }


?>