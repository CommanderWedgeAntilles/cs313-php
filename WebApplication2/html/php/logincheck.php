<?php
if(!isset($_SESSION['username'])){
    echo "Not Logged In";

}else{
    echo "Logged In";
}
?>