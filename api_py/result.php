<!DOCTYPE html>
<html lang="en">
<!-- https://www.doabledanny.com/Deploy-PHP-And-MySQL-to-Heroku -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Scoring Result</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-ligth">
        <div class="container-xxl">
            <a href="#" class="navbar-brand">
                <span class="fw-bold border-none bg-secondary text-white p-2 rounded-3">ML Credit Card APP
                    <i class="bi bi-credit-card ms-2"></i>
                </span>
            </a>
            <!-- Toggle Button for mobile navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                aria-controls="main-nav" aria-expanded="false" aria-label="Toggle-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar link -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <!-- <a class="nav-link text-dark btn btn-secondary" href="#pricing">Test Now !</a> -->
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?php 
      if(isset($_POST) && !empty($_POST))
      {
          $var1 = $_POST['chang_nbre_trans'];
          $var2 = $_POST['mont_total_trans'];
          $var3 = $_POST['solde_renouv_total'];
          $var4 = $_POST['nbre_total_prod'];
          $var5 = $_POST['chang_mont_trans'];
          $var6 = $_POST['nbre_total_trans'];
          $var7 = $_POST['nbre_contact_12'];
          $nom_prenom =(array_key_exists('nom_prenom',$_POST)) ? $_POST['nom_prenom'] : "";
          
         $api_link = 'http://card_credit.test/api_py/api.py?var1='.$var1.'&var2='.$var2.'&var3='.$var3.'&var4='.$var4.'&var5='.$var5.'&var6='.$var6.'&var7='.$var7;
        //  $api_link = 'https://ml-scoring-app.herokuapp.com/api_py/api.py?var1='.$var1.'&var2='.$var2.'&var3='.$var3.'&var4='.$var4.'&var5='.$var5.'&var6='.$var6.'&var7='.$var7;
         $api_content = file_get_contents($api_link);

        $result = explode(' ',$api_content);
        $class = $result[0];
        $class_0_proba = floatval($result[1])*100;
        $class_1_proba = floatval($result[2])*100;
      }
    ?>
    
    <?php if($class == 0): ?>
    <div class="col-9 col-lg-4 position-absolute top-50 start-50 translate-middle">
        <div class="card border-secondary border-1">
            <div class="card-header text-center h4 text-secondary">Résultat du Traitement</div>
            <div class="card-body text-center py-3">
                <p class="display-4 my-4 text-success fw-bold"><i class="bi bi-emoji-smile-fill"></i></p>
                <?php if($nom_prenom !=""):?>
                <p class="card-text mx-5 fw-bold h5 d-none d-lg-block">
                    Le client <?= $nom_prenom; ?> est statisfait des services.
                </p>
                <?php else:?>
                    <p class="card-text mx-5 fw-bold h5 d-none d-lg-block">Le client est statisfait des services.</p>
                <?php endif;?>
                <p class="card-text mx-5 fw-bold h6 d-none d-lg-block">Il y a <?=$class_0_proba;?>% de chance qu'il reste</p>
                <a href="../index.php" class="btn btn-secondary mt-3 btn-lg"><i class="bi bi-skip-backward-fill me-2"></i>Retour</a>
            </div>
        </div>
    </div>
    <?php elseif($class == 1): ?>
    <div class="col-9 col-lg-4 position-absolute top-50 start-50 translate-middle">
        <div class="card border-secondary border-1">
            <div class="card-header text-center h4 text-secondary">Résultat du Traitement</div>
            <div class="card-body text-center py-3">
                <p class="display-4 my-4 text-danger fw-bold"><i class="bi bi-emoji-angry-fill"></i></p>
                <?php if($nom_prenom !=""):?>
                <p class="card-text mx-5 fw-bold h5 d-none d-lg-block">
                    Le client <?= $nom_prenom; ?> n'est pas statisfait des services.
                </p>
                <?php else:?>
                    <p class="card-text mx-5 fw-bold h5 d-none d-lg-block">Le client n'est pas statisfait des services.</p> 
                <?php endif;?>
                <p class="card-text mx-5 fw-bold h6 d-none d-lg-block">Il y a <?=$class_1_proba;?>% de chance qu'il se désabonne.</p>
                <a href="../index.php" class="btn btn-secondary mt-3 btn-lg"><i class="bi bi-skip-backward-fill me-2"></i>Retour</a>
            </div>
        </div>
    </div>
    <?php else :?>
    <p>Aucune décision</p>
    <?php endif;?>
</body>

</html>
