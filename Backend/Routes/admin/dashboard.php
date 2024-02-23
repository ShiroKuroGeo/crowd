<?php
    session_start();
    require("../../Backend/admin/dashboard.php");

    $method = $_POST['METHOD'];
    if(function_exists($method)){
        call_user_func($method);
    }else{
        echo "Function not Exist";
    }

    function getAllUser(){
        $dashboard = new dashboard();
        
        echo $dashboard->getAllUser();
    }

    function getAllDonations(){
        $dashboard = new dashboard();
        
        echo $dashboard->getAllDonations();
    }

    function getAllCampaigns(){
        $dashboard = new dashboard();
        
        echo $dashboard->getAllCampaigns();
    }
    
    function deleteId(){
        $dashboard = new dashboard();
        
        echo $dashboard->deleteId($_POST['ID']);
    }
    
    function updateCampaign(){
        $dashboard = new dashboard();
        
        echo $dashboard->updateCampaign($_POST['id'],$_POST['status']);
    }
    
    function getDonationWithUserAndCampaigns(){
        $dashboard = new dashboard();
        
        echo $dashboard->getDonationWithUserAndCampaigns();
    }
    
    function getAllColumnTable(){
        $dashboard = new dashboard();
        
        echo $dashboard->getAllColumnTable();
    }
    
    function getContact(){
        $dashboard = new dashboard();
        
        echo $dashboard->getContact();
    }

    function getProfileUser(){
        $dashboard = new dashboard();
        
        echo $dashboard->selected($_POST['user_id']);
    }

    function updateUserStatus(){
        $dashboard = new dashboard();
        
        echo $dashboard->updateUserStatus($_POST['user_id'], $_POST['status']);
    }

?>