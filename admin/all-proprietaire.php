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
<h1 class="text-primary"><i class="fas fa-users"></i> PROPRIETAIRE</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Tableau de Bord </a></li>
     <li class="breadcrumb-item active" aria-current="page">Tous Les proprietaires</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">adresse</th>
      <th scope="col">Telphone Pro</th>
      <th scope="col">Telephone Personnel</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `proprietaire`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td> '.$result['nom'].'</td>
          <td>'.$result['adresse'].'</td>
          <td> '.$result['telpro'].'</td>
          <td>'.$result['telper'].'</td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
 