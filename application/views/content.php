<?php
    if ($_GET['modul']=='home'){
        if($this->session->userdata('loggedIn')['Role'] == 'Wali')
        {
            include "Pages/Dashboard/DashboardWali.php"; 
        }
        else{
            include "Pages/Dashboard/DashboardAdmin.php"; 
        }
    }
    //MASTER
    elseif ($_GET['modul']=='masterKaryawan'){
        include "Pages/Master/MasterKaryawan.php"; 
    }
    elseif ($_GET['modul']=='masterSantri'){
        include "Pages/Master/MasterSantri.php"; 
    }
    elseif ($_GET['modul']=='masterAsrama'){
        include "Pages/Master/MasterAsrama.php"; 
    }
    // elseif ($_GET['modul']=='masterBiaya'){
    //     include "Pages/Master/MasterBiaya.php"; 
    // }
    // elseif ($_GET['modul']=='masterBiayaDetail'){
    //     include "Pages/Master/MasterBiayaDetail.php"; 
    // }
    // elseif ($_GET['modul']=='mahasiswa'){
    //     include "mahasiswa.php"; 
    // }
    //FINANCE
    elseif ($_GET['modul']=='financePayroll'){
        include "Pages/Finance/FinancePaymentSlips.php"; 
    }
    elseif ($_GET['modul']=='financePaymentHistory'){
        include "Pages/Finance/FinancePaymentHistory.php"; 
    }
    //ACTIVITY
    
    elseif ($_GET['modul']=='activityPerizinan'){
        include "Pages/Activity/ActivityPerizinan.php"; 
    }
?>