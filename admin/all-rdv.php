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
<h1 class="text-primary"><i class="fas fa-users"></i> RENDEZ-VOUS</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Tableau de Bord </a></li>
     <li class="breadcrumb-item active" aria-current="page">Tous Les rdv</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom Client</th>
      <th scope="col">Nom agent</th>
      <th scope="col">Date rdv</th>
      <th scope="col">Lieux rdv</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `allrdv`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td> '.$result['nom_client'].'</td>
          <td>'.$result['nom_agent'].'</td>
          <td> '.$result['date_rdv'].'</td>
          <td>'.$result['lieux_rdv'].'</td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
 