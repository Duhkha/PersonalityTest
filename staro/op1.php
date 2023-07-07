<?php

//localhost/PersonalityTest/op.php?type=add&firstname=user3&lastname=guza
//type=delete&id=12%20OR%201=1
//id is equal 12 or 1
require_once("rest/dao/UsersDao.class.php");
$users_dao= new UsersDAO();

$type= $_REQUEST['type'];

switch($type){
    case 'add':
        $firstname=$_REQUEST['firstname'];
        $lastname=$_REQUEST['lastname'];
        $results=$users_dao->add($firstname, $lastname);
        print_r($results);
        break;
        
    case 'delete':
        $id=$_REQUEST['id'];
            $users_dao->delete($id);
            
        break;

    case 'update':
        $firstname=$_REQUEST['firstname'];
        $lastname=$_REQUEST['lastname'];
        $id=$_REQUEST['id'];
        $users_dao->update($firstname, $lastname,$id);
        break;

    case 'get':
        print_r('get');
        break;

    default:
    $results=$users_dao->get_all();
    print_r($results);
    break;
}


?>