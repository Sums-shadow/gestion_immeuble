<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addpro'])) {
  	$name = $_POST['name'];
  	$adresse = $_POST['adresse']; 
  	$telpro = intval($_POST['telpro']);
  	$telper =intval($_POST['telper']);
 
$sql="INSERT INTO `proprietaire`(`nom`, `adresse`, `telpro`, `telper`) VALUES ('$name','$adresse',$telpro,$telper)";
  	if (mysqli_query($db_con,$sql)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">propietaire Inseré avec succés!</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
  	}
  }
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Ajouter proprietaire</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Immeuble insert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
		<div class="shadow-sm border p-5">
		<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Nom du proprietaire</label>
		    <input name="name" type="text" class="form-control" id="name"  >
	  	</div>
	  	<div class="form-group">
		    <label for="adresse">Adresse</label>
		    <input name="adresse" type="text" class="form-control" id="adresse">
	  	</div>
	  	<div class="form-group">
		    <label for="telpro">Numero telephone professionnel</label>
		    <input name="telpro" type="tel" class="form-control" id="telpro"  >
	  	</div>
	  	<div class="form-group">
		    <label for="telper">Numero telephone personnel</label>
		    <input name="telper" type="tel" class="form-control" id="telper" >
	  	</div>
	  
	  	<div class="form-group text-center">
		    <input name="addpro" value="Enregistrer" type="submit" class="btn btn-danger">
	  	</div>
	 </form>



		</div>
	</div>
</div>