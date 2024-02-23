<?php
session_start();
require("../../Backend/regular/dashboard.php");

$method = $_POST['METHOD'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo "Function not Exist";
}

function getProfileUser()
{
    $dashboard = new dashboard();

    echo $dashboard->getAllUser($_SESSION['user_id']);
}

function getDonationOfUser()
{
    $dashboard = new dashboard();

    echo $dashboard->getDonationOfUser($_SESSION['user_id']);
}

function getNeedApprovalOfUser()
{
    $dashboard = new dashboard();

    echo $dashboard->getNeedApprovalOfUser($_SESSION['user_id']);
}

function getViewAllIDonated()
{
    $dashboard = new dashboard();

    echo $dashboard->getViewAllIDonated($_SESSION['user_id']);
}

function getCampaignOfUser()
{
    $dashboard = new dashboard();

    echo $dashboard->getCampaignOfUser($_SESSION['user_id']);
}

function getUserCampaign()
{
    $dashboard = new dashboard();

    echo $dashboard->getUserCampaign();
}

function updateCampaign()
{
    $dashboard = new dashboard();

    echo $dashboard->updateCampaign($_POST['due']);
}

function deleteApproval()
{
    $dashboard = new dashboard();

    echo $dashboard->deleteApproval($_POST['id']);
}

function getContactUs()
{
    $dashboard = new dashboard();

    echo $dashboard->getContactUs($_POST['name'], $_POST['email'], $_POST['address'], $_POST['message']);
}

function UpdateProfile()
{
    $dashboard = new dashboard();

    echo $dashboard->UpdateProfile($_SESSION['user_id'], $_POST['name'], $_POST['email'], $_POST['address']);
}

function doGetPassApproval()
{
    $dashboard = new dashboard();

    echo $dashboard->doGetPassApproval($_SESSION['user_id'], $_POST['donateId'], $_POST['amount'], $_POST['picture']);
}

function doDonate()
{
    $dashboard = new dashboard();

    $location = $_SERVER['DOCUMENT_ROOT'] . "/Crowd/Assets/Img/";
    $picture = '';
    if (isset($_FILES['proof']['name'])) {

        $finalfile = $location . $_FILES["proof"]['name'];
        if (move_uploaded_file($_FILES['proof']['tmp_name'], $finalfile)) {
            $picture = $_FILES["proof"]['name'];
        }
    }

    echo $dashboard->doDonate($_SESSION['user_id'], $_POST['donateId'], $_POST['amount'], $picture);
}

// $dashboard = new dashboard();

// $location = $_SERVER['DOCUMENT_ROOT'] . "/Crowd/Assets/Img/";
// $image = [];

// if (isset($_FILES['image']['name'])) {
//     foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
//         $imageFinal = $location . $_FILES["image"]['name'][$key];

//         if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $imageFinal)) {
//             $image[] = $_FILES["image"]['name'][$key];
//         }
//     }
// }

// // Print each image name
// foreach ($image as $imageName) {
//     echo $imageName . "<br>";
// }

function storeCampaign()
{
    $dashboard = new dashboard();

    $location = $_SERVER['DOCUMENT_ROOT'] . "/Crowd/Assets/Img/";
    $image = '';
    $gcash = '';
    $validId = '';

    if (isset($_FILES['image']['name']) && isset($_FILES['gcash']['name']) && isset($_FILES['validId']['name'])) {

        $gcashFinal = $location . $_FILES["gcash"]['name'];
        $validIdFinal = $location . $_FILES["validId"]['name'];
        $imageFinal = $location . $_FILES["image"]['name'];

        if (move_uploaded_file($_FILES['gcash']['tmp_name'], $gcashFinal) && move_uploaded_file($_FILES['validId']['tmp_name'], $validIdFinal) && move_uploaded_file($_FILES['image']['tmp_name'], $imageFinal)) {
            $gcash = $_FILES["gcash"]['name'];
            $validId = $_FILES["validId"]['name'];
            $image = $_FILES["image"]['name'];
        }
    }
    echo $dashboard->getStoreCampaign($_SESSION['user_id'], $_POST['entryName'], $_POST['categ'], $_POST['goal'], $_POST['location'], $_POST['deadline'], $_POST['description'], $gcash, $validId, $image);
}

// function storeComment(){
//     $dashboard = new dashboard();

//     echo $dashboard->storeComment($_SESSION['user_id'], $_POST['campaignId'], $_POST['categ'], $_POST['goal'], $_POST['location'], $_POST['deadline'], $_POST['description'], $gcash, $validId, $image);
// }

function getComment()
{
    $dashboard = new dashboard();

    echo $dashboard->getComment($_POST['campaignId']);
}

function allImages()
{
    $dashboard = new dashboard();

    echo $dashboard->allImages($_POST['campaignId']);
}

function dogetCampaignUsingId()
{
    $dashboard = new dashboard();

    echo $dashboard->dogetCampaignUsingId($_POST['campaignId']);
}

function storeComment()
{
    $dashboard = new dashboard();

    echo $dashboard->storeComment($_SESSION['user_id'], $_POST['comment'], $_POST['donationId']);
}

function doUpdateUserCampaign()
{
    $dashboard = new dashboard();

    echo $dashboard->doUpdateUserCampaign($_POST['Title'], $_POST['Cate'], $_POST['Goal'], $_POST['Loc'], $_POST['Due'], $_POST['Desc'], $_POST['Proof'], $_POST['Id']);
}
