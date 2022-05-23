<?php
    //Form Action
    $act = "";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'Karyawan';
    }
    $idDataTable ="#dgMasterSantri";