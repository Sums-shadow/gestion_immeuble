<?php require_once './admin/db_con.php';
?>
<!DOCTYPE html>
<html lang="fr">

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
   
<div class="mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="https://png.pngtree.com/template/20190926/ourmid/pngtree-realty-flat-apartment-modern-building-logo-design-graphic-style-image_309739.jpg"
                                alt="" class="img-rounded img-responsive" width="50%" />
                        </div>
                        <div class="col-sm-6 col-md-8 mx-auto pt-5 mt-5">
                            <h1>
                                GESTION IMMEUBLE</h1>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">


    <?php
	$query = "SELECT * FROM `imeuble_info`";
  $result = mysqli_query($db_con, $query);

    if (mysqli_num_rows($result)>0) {
      $i=1;
   while($row = mysqli_fetch_array($result)){  ?>
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Immeuble N° <?=$i?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="the-price">
                                <p class="lead">Proprietaire: <?=$row['nom_proprietaire']?> </p>
                               
                                <p> Tél: <?=$row['tel_pro_proprietaire']?></p>
                            </div>
                            <table class="table">
                                <tr>
                                    <td>
                                        Adresse: <?=$row['adresse_immeuble']?>  
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Année de construction: <?=$row['anne_construction']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Type d'appartement: <?=$row['type_appartement']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Charge trimestriel: <?=$row['charge_trimestriel']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Prix de vente: <?=$row['prix_vente']?> $
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Station Autobus: <?=$row['station_autobus']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Surface Terrain: <?=$row['surface_terrain']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Nombre de piece: <?=$row['nbr_piece']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Prix/metre²: <?=$row['prix_metre']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        Nombre d'etage: <?=$row['nbr_etage']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                    Loyer mensuel: <?=$row['loyer_mensuel']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                    Surface habitable: <?=$row['surface_habitable']?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                     <?php if($row['surface_habitable']=='possede_assensceur'){ echo 'Possede d\'assesceur';}else{echo "Ne possede pas d'assensceur";} ?>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                     <?php if($row['garage']=='possede_assensceur'){ echo 'Possede de garage';}else{echo "Ne possede pas de garage";} ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/rdv.php?id=<?=$row['id_immeuble']?>"
                                            class="btn btn-danger text-light">Prendre rendez-vous </a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php } } else{ ?>

        <div class="container border border-primary text-muted p-3 mb-5 ">Aucune immeuble trouvée! <br> Repasser plutard</div>
<?php } ?>
        <!-- <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true"
            data-animation="true" data-delay="2000">
            <div class="toast-header">
                <strong class="mr-auto">Alert Insertion Touriste</strong>
                <small> </small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">

            </div>
        </div>

        <div class="bg-light p-5">
            <form enctype="multipart/form-data" method="POST" action="">

                <div class="row">
                    <div class="form-group col-8">
                        <label for="touriste">touriste</label>
                        <input type="hidden" name="idtour" id="idtour">
                        <input name="touriste" type="text" class="form-control" id="touriste" disabled>
                    </div>
                    <div class="form-group col-4">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" class="form-control" id="sexe" required="">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="ecole">Ecole</label>
                        <input name="ecole" type="text" class="form-control" id="ecole" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="classe">Classe</label>
                        <input name="classe" type="text" class="form-control" id="classe" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="lieunaissance">Lieu de naissance</label>
                        <input name="lieunaissance" type="text" class="form-control" id="lieunaissance" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="datenaissance">Date de naissance</label>
                        <input name="datenaissance" type="date" class="form-control" id="datenaissance" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="adresse">Adresse</label>
                        <input name="adresse" type="text" class="form-control" id="adresse" required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="mail">Mail</label>
                        <input name="mail" type="text" class="form-control" id="mail" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="contact">Contact</label>
                        <input name="contact" type="text" class="form-control" id="pcontact" pattern="08[1|2][0-9]{8}"
                            placeholder="08........." required="">
                    </div>
                    <div class="form-group col-6">
                        <label for="photo">Touriste Photo</label>
                        <input name="photo" type="file" class="form-control" id="photo" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12 border mx-3">
                        <span class="lead">Site à visiter</span><br>

                    </div>
                </div>
                <div class="form-group text-center">
                    <input name="addtouriste" value="Faite une reservation" type="submit" class="btn btn-danger ">
                </div>
            </form>
        </div> -->

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
.banner{
    background:url('assets/banner.jpg')
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