<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addimm'])) {

	  extract($_POST);
$id_proprietaire=intval($id_proprietaire);
$id_agent=intval($id_agent);
$nbr_piece=intval($nbr_piece);
$prix_metre=intval($prix_metre);
$prix_vente=intval($prix_vente);
$nbr_etage=intval($nbr_etage);


  	$query = "INSERT INTO `immeuble`(`adresse`, `anne_construction`, `possede_assensceur`, `type_appartement`, `charge_trimestriel`, `prix_vente`, `station_autobus`, `surface_terrain`, `garage`, `nbr_piece`, `prix_metre`, `loyer_mensuel`, `surface_habitable`, `nbr_etage`, `id_proprietaire`, `id_agent`) VALUES ('$adresse', '$anne_construction', '$possede_assensceur', '$type_appartement', '$charge_trimestriel', $prix_vente, '$station_autobus', '$surface_terrain', '$garage', $nbr_piece, $prix_metre, $loyer_mensuel, '$surface_habitable', $nbr_etage, $id_proprietaire,$id_agent)";
      if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;"> Tour Ajouté !</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Immeuble non Ajouté , svp Aouté les bonnes informations!</p>';
  	}
  }
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="index.php">Tableau de bord </a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajouter un immeuble</li>
    </ol>
</nav>

<div class="row">

    <div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true"
            data-animation="true" data-delay="2000">
            <div class="toast-header">
                <strong class="mr-auto">Alert Insertion immeuble</strong>
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
       <div class="shadow-sm p-5 border">
	   <form enctype="multipart/form-data" method="POST" action="">
            <div class="form-group ">
                <label for="id_proprietaire">Proprietaire</label>
                <select name="id_proprietaire" class="form-control" id="id_proprietaire">
                    <?php 
						$query=mysqli_query($db_con,'SELECT * FROM `proprietaire`');
						while ($result = mysqli_fetch_array($query)) { ?>
                    <option value="<?=$result['id']?>"><?=$result['nom']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group ">
                <label for="id_agent">Agent</label>
                <select name="id_agent" class="form-control" id="id_agent">
                    <?php 
						$query=mysqli_query($db_con,'SELECT * FROM `agent`');
						while ($result = mysqli_fetch_array($query)) { ?>
                    <option value="<?=$result['id']?>"><?=$result['nom']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="adresse">adresse</label>
                <input name="adresse" type="text" class="form-control" id="adresse">
            </div>
            <div class="form-group">
                <label for="possede_assensceur">Possede-t-elle l'assensceur?</label>
				<select name="possede_assensceur" class="form-control" id="possede_assensceur">
                   
                    <option value="oui">OUI</option>
                    <option value="nom">NON</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="charge_trimestriel">Charge trimestrielle</label>
                <input name="charge_trimestriel" type="text" class="form-control" id="charge_trimestriel">
            </div>
            <div class="form-group">
                <label for="anne_construction">annee construite</label>
                <input name="anne_construction" type="text" class="form-control" id="anne_construction">
            </div>
            <div class="form-group">
                <label for="prix_vente">Prix de vente</label>
                <input name="prix_vente" type="text" class="form-control" id="prix_vente">
            </div>
            <div class="form-group">
                <label for="station_autobus"> Station Auto bus</label>
                <input name="station_autobus" type="text" class="form-control" id="station_autobus">
            </div>
            <div class="form-group">
                <label for="surface_terrain">Surface terrain</label>
                <input name="surface_terrain" type="text" class="form-control" id="surface_terrain">
            </div>
            <div class="form-group">
                <label for="garage">Garage</label>
                <select name="garage" class="form-control" id="garage">
                   
                    <option value="oui">OUI</option>
                    <option value="nom">NON</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type_appartement">Type appartement</label>
                <select name="type_appartement" class="form-control" id="type_appartement">
                   
                    <option value="pavillon">Pavillon</option>
                    <option value="appartement">Appartement</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="nbr_piece">Nombre de piece</label>
                <input name="nbr_piece" type="number" class="form-control" id="nbr_piece">
            </div>
            <div class="form-group">
                <label for="prix_metre">Prix au metre²</label>
                <input name="prix_metre" type="text" class="form-control" id="prix_metre">
            </div>
            <div class="form-group">
                <label for="loyer_mensuel"> loyer mensuel</label>
                <input name="loyer_mensuel" type="text" class="form-control" id="loyer_mensuel">
            </div>
            <div class="form-group">
                <label for="surface_habitable">Surface habitable</label>
                <input name="surface_habitable" type="text" class="form-control" id="surface_habitable">
            </div>
            <div class="form-group">
                <label for="nbr_etage">nombre d'etage</label>
                <input name="nbr_etage" type="number" class="form-control" id="nbr_etage">
            </div>
            <div class="form-group text-center">
                <input name="addimm" value="Ajouter un immeuble" type="submit" class="btn btn-danger">
            </div>
        </form>
	   </div>
    </div>
</div>