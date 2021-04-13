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
<h1 class="text-primary"><i class="fas fa-users"></i>  IMMEUBLE</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Tableau de Bord </a></li>
     <li class="breadcrumb-item active" aria-current="page">Tous Les immeubles</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">adresse</th>
      <th scope="col">Annee de construction</th>
      <th scope="col">Prix de vente</th>
      <th scope="col">Nombre d'etage</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `imeuble_info`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td> Immeuble '.$i.'</td>
          <td>'.$result['adresse_immeuble'].'</td>
          <td>'.ucwords($result['anne_construction']).'</td>
          <td> '.$result['prix_vente'].'</td>
          <td>'.$result['nbr_etage'].'</td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>