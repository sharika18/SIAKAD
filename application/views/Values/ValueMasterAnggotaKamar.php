<?php
    
    $kamarID = "0";
    if($_GET['kamarID'])
    {
        $kamarID = $_GET['kamarID'];
    }
    
    // $asramaID = "0";
    // if($_GET['asramaID'])
    // {
    //     $asramaID = $_GET['asramaID'];
    // }

    $idDataTable = "#dgMasterAnggotaKamar";
    $deleteController = base_url('AnggotaKamar/HapusAnggotaKamar/');
?>
