<?php require_once './admin/db_con.php';
session_start();
 

if(isset($_GET['id'])){
 

}
if(isset($_POST['addrdv'])){
    extract($_POST);
   
    $query ="INSERT INTO `client`(`nom`, `adresse`, `telpro`, `telper`) VALUES ('$nom', '$adresse', '$telpro', '$telper');";
    $q="Select id from `client` GROUP BY id DESC";
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Touriste Inseré !</p>';
        $res= mysqli_query($db_con,$q);
        $r=mysqli_fetch_assoc($res);
        $query2=" INSERT INTO `rdv`( `id_agent`, `id_client`, `date`, `lieu`) VALUES ($id_agent,$r[id],'$daterdv','$lieuxrdv')";
       
        if (mysqli_query($db_con,$query2)) {
            $datainsert['insertsucess'] = '<p style="color: green;">Touriste Inseré !</p>';
          }else{
            $datainsert['inserterror']= '<p style="color: red;">Student Not Inserted Touriste Non Inseré, svp entrer les bonnes informations !</p>';
        var_dump('faile2'); 
        }
      }else{
        $datainsert['inserterror']= '<p style="color: red;">Student Not Inserted Touriste Non Inseré, svp entrer les bonnes informations !</p>';
    }
}
if (isset($_POST['addtouriste'])) {
  if(!empty($_POST['tourdata'])){
  foreach($_POST['tourdata'] as $tour){
  

  $touriste = $_POST['idtour'];
  $sexe = $_POST['sexe'];
  $nom = $_POST['nom'];
  $Adresse = $_POST['Adresse'];
  $telpro = $_POST['telpro'];
  $telper = $_POST['telper'];
  $adresse = $_POST['adresse'];
  $mail = $_POST['mail'];
  $contact = $_POST['contact'];
  $lieux=$tour;
  $photo = explode('.', $_FILES['photo']['name']);
  $photo = end($photo); 
  $photo = $touriste.date('Y-m-d-m-s').'.'.$photo;
// print_r($_POST);
  $query = "INSERT INTO `touriste` (`touriste`, `sexe`, `nom`, `Adresse`, `telpro`, `telper`, `photo`, `adresse`, `contact`, `mail`, `lieux`)  VALUES ( '$touriste', '$sexe', '$nom','$Adresse', '$telpro','$telper','$photo','$adresse','$contact','$mail', '$lieux');";
  // print_r($query); die();
  if (mysqli_query($db_con,$query)) {
    
    $datainsert['insertsucess'] = '<p style="color: green;">Touriste Inseré !</p>';
  		move_uploaded_file($_FILES['photo']['tmp_name'], './admin/images/'.$photo);

    // header('Location: ./index.php');
    
  }else{
    $datainsert['inserterror']= '<p style="color: red;">Student Not Inserted Touriste Non Inseré, svp entrer les bonnes informations !</p>';
  }
  }
  }else{
  $datainsert['inserterror']= '<p style="color: red;">Veuillez selectionner un lieux!</p>';

  }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION IMMEUBLE</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light text-center">
        <h1>Prennez rendez-vous maintenant</h1>
    </nav>

    <div class="container mt-5">
       

        <div class="container">
            <div class="row">
    
        <h3 class="container border border-primary text-muted p-3 mb-5">Faite une
            nouvelle réservation dans le formulaire ci-dessous</h3>
        <?php if (isset($datainsert)) {?>
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true"
            data-animation="true" data-delay="2000">
            <div class="toast-header">
                <strong class="mr-auto">Alert Insertion Touriste</strong>
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
        <div class="bg-light p-5">
            <form enctype="multipart/form-data" method="POST" action="">

                <div class="row">
                    <div class="form-group col-6">
                        <label for="touriste">Immeuble</label>
                        <input name="touriste" type="text" class="form-control" id="touriste" disabled
                            value="Immeuble N°<?=$_GET['id'] ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="agent">Agent</label>
                        <input name="agent" type="text" class="form-control" id="touriste" disabled
                            value="<?php $tusers=mysqli_query($db_con,'SELECT * FROM `imeuble_info`'); $tusers= mysqli_fetch_array($tusers); echo $tusers['nom_agent']; ?>">
                        <input name="id_agent" type="hidden" class="form-control" id="id_agent" 
                            value="<?php $tusers=mysqli_query($db_con,'SELECT * FROM `imeuble_info`'); $tusers= mysqli_fetch_array($tusers); echo $tusers['id_agent']; ?>">
                    </div>
                 
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nom">Nom</label>
                        <input name="nom" type="text" class="form-control" id="nom" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="adresse">Adresse</label>
                        <input name="adresse" type="text" class="form-control" id="adresse" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="telpro">Numéro de téléphone Prof</label>
                        <input name="telpro" type="text" class="form-control" id="telpro" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="telper">Numéro de téléphone Perso</label>
                        <input name="telper" type="text" class="form-control" id="telper" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="daterdv">Date de rdv</label>
                        <input name="daterdv" type="date" class="form-control" id="daterdv" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="lieuxrdv">Lieux de rdv</label>
                        <input name="lieuxrdv" type="text" class="form-control" id="lieuxrdv" required="">
                    </div>
                </div>
               

              
                <div class="form-group text-center">
                    <input name="addrdv" value="Valider" type="submit" class="btn btn-danger w-50">
                </div>
            </form>
        </div>

      
    </div>
</body>

</html>


<style>
.panel {
    text-align: center;
}

.panel:hover {
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px 5px rgba(130, 130, 130, 0.35);
}

.panel-body {
    padding: 0px;
    text-align: center;
}

.the-price {
    background-color: rgba(220, 220, 220, .17);
    box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
    padding: 20px;
    margin: 0;
}

.the-price h1 {
    line-height: 1em;
    padding: 0;
    margin: 0;
}

.subscript {
    font-size: 25px;
}

.glyphicon {
    margin-bottom: 10px;
    margin-right: 10px;
}

small {
    display: block;
    line-height: 1.428571429;
    color: #999;
}

/* CSS-only ribbon styles    */
.cnrflash {
    /*Position correctly within container*/
    position: absolute;
    top: -9px;
    right: 4px;
    z-index: 1;
    /*Set overflow to hidden, to mask inner square*/
    overflow: hidden;
    /*Set size and add subtle rounding  		to soften edges*/
    width: 100px;
    height: 100px;
    border-radius: 3px 5px 3px 0;
}

.cnrflash-inner {
    /*Set position, make larger then 			container and rotate 45 degrees*/
    position: absolute;
    bottom: 0;
    right: 0;
    width: 145px;
    height: 145px;
    -ms-transform: rotate(45deg);
    /* IE 9 */
    -o-transform: rotate(45deg);
    /* Opera */
    -moz-transform: rotate(45deg);
    /* Firefox */
    -webkit-transform: rotate(45deg);
    /* Safari and Chrome */
    -webkit-transform-origin: 100% 100%;
    /*Purely decorative effects to add texture and stuff*/
    /* Safari and Chrome */
    -ms-transform-origin: 100% 100%;
    /* IE 9 */
    -o-transform-origin: 100% 100%;
    /* Opera */
    -moz-transform-origin: 100% 100%;
    /* Firefox */
    background-image: linear-gradient(90deg, transparent 50%, rgba(255, 255, 255, .1) 50%), linear-gradient(0deg, transparent 0%, rgba(1, 1, 1, .2) 50%);
    background-size: 4px, auto, auto, auto;
    background-color: #aa0101;
    box-shadow: 0 3px 3px 0 rgba(1, 1, 1, .5), 0 1px 0 0 rgba(1, 1, 1, .5), inset 0 -1px 8px 0 rgba(255, 255, 255, .3), inset 0 -1px 0 0 rgba(255, 255, 255, .2);
}

.cnrflash-inner:before,
.cnrflash-inner:after {
    /*Use the border triangle trick to make  				it look like the ribbon wraps round it's 				container*/
    content: " ";
    display: block;
    position: absolute;
    bottom: -16px;
    width: 0;
    height: 0;
    border: 8px solid #800000;
}

.cnrflash-inner:before {
    left: 1px;
    border-bottom-color: transparent;
    border-right-color: transparent;
}

.cnrflash-inner:after {
    right: 0;
    border-bottom-color: transparent;
    border-left-color: transparent;
}

.cnrflash-label {
    /*Make the label look nice*/
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    padding-bottom: 5px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(1, 1, 1, .8);
    font-size: 0.95em;
    font-weight: bold;
    text-align: center;
}
</style>