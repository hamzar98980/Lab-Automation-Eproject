
<!doctype html>
<html lang="en">
<head>
    <title>LabAutomation - Welcome to Master</title>
</head>
  <body>
     
      <?php include 'navbar.php';
      include '../dbconfig.php';
      
        ?>
      <div class="page-container">
      <?php include 'Header.php';?>
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                   </div>
                    <div class="main-wrapper">

                        <div class="row stats-row">


                        
                    <?php
                    $sql_prd = "select count(p_id) count_prd from tb_prd";
                    $res = $con->query($sql_prd);
                    while($r = $res->fetch_array())
                    {

                        ?>
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                        <div class="stats-info">
                                            <h5 class="card-title"><?php  echo $r['count_prd'] ?><span class="stats-change stats-change-danger"></span></h5>
                                            <p class="stats-text">Total Products</p>
                                        </div>
                                        <div class="stats-icon change-success">
                                            <i class="material-icons">trending_down</i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                    }
                    
                            ?>


                    <?php 
                    
                    $sql_tid = "select count(t_id) Total from tb_tester where t_status = 'Passed' ";
                    $red = $con->query($sql_tid);
                    while($re = $red->fetch_array()){
                    
                    ?>
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                        <div class="stats-info">
                                        <h5 class="card-title">  <?php echo $re['Total'] ?>     <span class="stats-change stats-change-success">+12%</span></h5>
                                            <p class="stats-text">Approved Products Status</p>
                                        </div>
                                        <div class="stats-icon change-success">
                                            <i class="material-icons">trending_up</i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    <?php } ?>



                    <?php 
                    
                    $sql_pen =" CALL `pndcount`(); ";
                    $pen = $con->query($sql_pen);
                    while($pr = $pen->fetch_array()){

                    ?>
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                        <div class="stats-info">
                                            <h5 class="card-title"><?php echo $pr['Pending']  ?><span class="stats-change stats-change-success">+70%</span></h5>
                                            <p class="stats-text">Pending Products</p>
                                        </div>
                                        <div class="stats-icon change-success">
                                            <i class="material-icons">trending_up</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card savings-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Testing Monthly<span class="card-title-helper">30 Days</span></h5>
                                        <div class="savings-stats">
                                            <h5>2000</h5>
                                            <span>Total Approved Products</span>
                                        </div>
                                        <div id="sparkline-chart-1"></div>
                                    </div>
                                </div>
                                <div class="card top-products">
                                    <div class="card-body">
                                        <h5 class="card-title">Top Tested Category<span class="card-title-helper">Today</span></h5>
                                        <div class="top-products-list">
                                            <div class="product-item">
                                                <h5></h5>
                                                <span>Environment testing</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div>
                                            <div class="product-item">
                                                <h5>Regression testing</h5>
                                                <span>1,876 downloads</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div>
                                            <div class="product-item">
                                                <h5>Automated testing</h5>
                                                <span>1,252 downloads</span>
                                                <i class="material-icons product-item-status product-item-danger">arrow_downward</i>
                                            </div>
                                            <!-- <div class="product-item">
                                                <h5>Meteor - Messaging App</h5>
                                                <span>938 downloads</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Current</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Reports</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Investments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="visitors-stats">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="visitors-stats-info">
                                                        <p>Testing products in the current period:</p>
                                                        <h5>15</h5>
                                                        <span>6-26 Apr</span>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-6">
                                                    <div class="visitors-stats-info">
                                                        <p>Unique visitors in the current period and ratio:</p>
                                                        <h5>58,403</h5>
                                                        <span>6-26 Apr</span>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div id="chart-visitors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="alert alert-info no-m" role="alert">
                                        Data has been updated 35 minutes ago, go to the reports page to access data history.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Server Load<span class="card-title-helper">Optimal</span></h5>
                                        <div class="server-load row">
                                            <div class="server-stat col-sm-4">
                                                <p>167GB</p>
                                                <span>Usage</span>
                                            </div>
                                            <div class="server-stat col-sm-4">
                                                <p>320GB</p>
                                                <span>Space</span>
                                            </div>
                                            <div class="server-stat col-sm-4">
                                                <p>57.4%</p>
                                                <span>CPU</span>
                                            </div>
                                        </div>
                                        <div id="server-load-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card card-transactions">
                                    <div class="card-body">
                                        <h5 class="card-title">Overall Status<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Product Company</th>
                                                        <th scope="col">Product SKU</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>0776</td>
                                                        <td>OSAKA</td>
                                                        <td>blb-0001</td>
                                                        <td><span class="badge badge-success">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>0759</td>
                                                        <td>CIRCUIT PROTECTION</td>
                                                        <td>Crp-8891</td>
                                                        <td><span class="badge badge-danger">Declined</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>0741</td>
                                                        <td>WEARABLES</td>
                                                        <td>Wer-0087</td>
                                                        <td><span class="badge badge-info">In Progress</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>0740</td>
                                                        <td>Envato Market</td>
                                                        <td>$17, 456</td>
                                                        <td><span class="badge badge-info">In Progress</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>0735</td>
                                                        <td>Graphic Design</td>
                                                        <td>$29, 999</td>
                                                        <td><span class="badge badge-secondary">Canceled</span></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?PHP
include 'ExtraNav.php' ?>
