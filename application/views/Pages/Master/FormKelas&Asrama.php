<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            Data Kelas & Asrama Santri
        </h3>
    </div>
    <div class="card-body p-0">
        <form action="<?php echo base_url()?>Karyawan/<?php echo $act?>" method="post" id="formSubmit">
            <div class="card-body">
                <div class="row">   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nomor Induk Santri Santri</label>
                            <select class="custom-select" id="selectNIS" name="selectNIS" required> 
                                <option value="0">-- Pilih NIS --</option>
                                <?php
                                if($pendidikanIsNotNull)
                                {
                                    for ($i=0; $i< count($pendidikan); $i++)
                                    {
                                    $selected = "";
                                    if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                    {
                                        $selected = 'selected = "selected"';
                                    }
                                    echo '
                                    
                                    <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                    ';
                                    } 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenjang Pendidikan</label>
                            <select class="custom-select" id="selectPendidikan" name="selectPendidikan" required> 
                                <option value="0">-- Pilih Jenjang --</option>
                                <?php
                                if($pendidikanIsNotNull)
                                {
                                    for ($i=0; $i< count($jenjangList); $i++)
                                    {
                                    $selected = "";
                                    if($pendidikanID == $jenjangList[$i]['pendidikanID'])
                                    {
                                        $selected = 'selected = "selected"';
                                    }
                                    echo '
                                    
                                    <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                    ';
                                    } 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="custom-select" id="selectKelas" name="selectKelas" required> 
                                <option value="0">-- Pilih Kelas --</option>
                                <?php
                                if($pendidikanIsNotNull)
                                {
                                    for ($i=0; $i< count($pendidikan); $i++)
                                    {
                                    $selected = "";
                                    if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                    {
                                        $selected = 'selected = "selected"';
                                    }
                                    echo '
                                    
                                    <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                    ';
                                    } 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Asrama</label>
                            <select class="custom-select" id="selectAsrama" name="selectAsrama" required> 
                                <option value="0">-- Pilih Asrama --</option>
                                <?php
                                if($pendidikanIsNotNull)
                                {
                                    for ($i=0; $i< count($pendidikan); $i++)
                                    {
                                    $selected = "";
                                    if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                    {
                                        $selected = 'selected = "selected"';
                                    }
                                    echo '
                                    
                                    <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                    ';
                                    } 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kamar</label>
                            <select class="custom-select" id="selectKamar" name="selectKamar" required> 
                                <option value="0">-- Pilih Kamar --</option>
                                <?php
                                if($pendidikanIsNotNull)
                                {
                                    for ($i=0; $i< count($pendidikan); $i++)
                                    {
                                    $selected = "";
                                    if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                    {
                                        $selected = 'selected = "selected"';
                                    }
                                    echo '
                                    
                                    <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                    ';
                                    } 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/> -->
                <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                
            </div>
        <!-- /.card-body -->

        </form>
            <div class="card-footer">
                <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" 
                class="btn btn-default">Cancel</a>
                <button type="submit" class="btnSubmit btn btn-success float-right" data-toggle="modal">
                    <?php 
                    $alertBoxSubmitMessage = "Apakah kamu yakin ingin menambahkan data berikut?";
                    echo $_GET['act'] 
                    ?>
                </button>
            </div>
    </div>
    <!-- /.card-body -->
</div>