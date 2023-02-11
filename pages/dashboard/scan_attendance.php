<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
?>
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 50px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
    <?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
             <!-- Content Header (Page header) -->
             <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Class</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">WELCOME</li>
                        <li class="breadcrumb-item active"><?php echo $_SESSION['faculty']?></li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
              </div>
            </div>
            <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-md-4"
                      style="padding:10px;background:#fff;border-radius: 5px;" 
                      id="divvideo">
                      
                      <center>
                        <p class="login-box-msg">
                          <i class="glyphicon glyphicon-camera"></i> TAP HERE</p>
                          <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                      <label class="btn btn-primary active">
                        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                      </label>
                    </div>
                      </center>
                                <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
                      <br>
                      <br>
                      <?php
                      if(isset($_SESSION['error'])){
                        echo "
                        <div class='alert alert-danger alert-dismissible' style='background:res;color:#fff;opacity:.8'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-info'></i>Input error</h4>
                          ".$_SESSION['error']."
                        </div>
                        ";
                        unset($_SESSION['error']);
                      }
                      if(isset($_SESSION['success'])){
                        echo "
                        <div class='alert alert-success alert-dismissible' style='background:green;color:#fff;opacity:.8'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-check'></i> Success!</h4>
                          ".$_SESSION['success']."
                        </div>
                        ";
                        unset($_SESSION['success']);
                      }
                      ?>

                
          </div>
            <div class="col-md-8">
              <div class="card card-outline card-primary">
              <form action="CheckInOut.php" 
                      method="post" 
                      class="form-horizontal" 
                      style="border-radius: 5px;padding:10px;background:#fff;" 
                      id="divvideo">
                     <i class="glyphicon glyphicon-qrcode"></i> <label>SCAN QR CODE</label> <p id="time"></p>
                     <input type="text" 
                            name="studentID" 
                            id="text" 
                            placeholder="scan qrcode" 
                            class="form-control" 
                            autofocus>
                </form></br>

				        <div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo" class="table-responsive p-0">
                <div class="card-body table-responsive p-0">
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <table id="example1" class="table table-striped ">
                   <thead style="font-size:15px">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Student ID</td>
                            <td>Time</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodedb";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
					            	$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT * FROM attendance LEFT JOIN student_info ON attendance.StudentID=student_info.StudentID WHERE LOGDATE='$date'";
                           $query = $conn->query($sql);
                           $i = 1;
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['FullName'];?></td>
                                <td><?php echo $row['StudentID'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                                <td style="color: blue;"><?php echo $row['STATUS'];?></td>
                                <td class="project-actions text-center">
                                  <a class="btn btn-info btn-sm" data-toggle="modal" href="#status<?php echo $row['ID']; ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                      Update
                                  </a>
                                  <?php include('updatestatus.php'); ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
                </div>
				
        </div>
				
            </div>

    </section>
  </div>
</div>
<script>
	function Export(){

				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
<script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
           });
        </script>
<!-- ./wrapper -->
<?php
include '../footer.php';
include '../scripts.php';
exit();
?>
</body>
</html>
