<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>

<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i>  Tableau de bord</a> <small></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> &nbsp; Ezechiel sums</li>
  </ol>
</nav>

<div class="row student">
  <div class="col-sm-4">
     <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $stu=mysqli_query($db_con,'SELECT * FROM `immeuble`'); $stu= mysqli_num_rows($stu); echo $stu; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Immeuble</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Voir plus</p>
          </div>
          <div class="col-sm-4">
            <a href="all-Touristes.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $tusers=mysqli_query($db_con,'SELECT * FROM `proprietaire`'); $tusers= mysqli_num_rows($tusers); echo $tusers; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Proprietaire</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=all-tour">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Voir plus</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $trdv=mysqli_query($db_con,'SELECT * FROM `rdv`'); $trdv= mysqli_num_rows($trdv); echo $trdv; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total RDV</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=all-tour">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Voir plus</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div> 
</div>
<hr>
 