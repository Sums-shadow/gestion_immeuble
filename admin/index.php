  <?php require_once 'db_con.php';
 
?>  
<!doctype html>
<html lang="fr">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

 
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Administration</title>
  </head>
  <body>
 
<br>
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
               <i class="fas fa-tachometer-alt"></i> Tableau de bord
              </a>
              <a href="index.php?page=add-agent" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Ajout Agent</a>
              <a href="index.php?page=add-immeuble" class="list-group-item list-group-item-action"><i class="fas fa-route"></i> Ajout Immeuble</a>
              <a href="index.php?page=add-proprietaire" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Ajout Proprietaire</a> <hr>
              <a href="index.php?page=all-immeuble" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Tous Les Immeuble</a>
              <a href="index.php?page=all-agent" class="list-group-item list-group-item-action"><i class="fas fa-route"></i> Tous Les Agents</a>
              <a href="index.php?page=all-proprietaire" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Tous Les Proprietaire</a>
              <a href="index.php?page=all-rdv" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Tous les rdv</a>
            </div>
          </div>
          <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'dashboard.php';
                    }

                    if (file_exists($page)) {
                      require_once $page;
                    }else{
                      require_once '404.php';
                    }
                  ?>
             </div>
        </div>
        </div>  
    </div>
    <div class="clearfix"></div>
    <footer>
      <div class="container">
      <p>Copyright &copy; <?php echo date('Y') ?></p>
      </div>
    </footer>
    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>
  </body>
</html>