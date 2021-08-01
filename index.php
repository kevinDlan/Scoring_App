<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/styles/main.css">
    <!-- Boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Credit Card Service</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-ligth">
        <div class="container-xxl">
            <a href="#intro" class="navbar-brand">
                <span class="fw-bold text-secondary">
                    <i class="bi bi-credit-card"></i>
                    Credit Card Test
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
    <!-- <form action="" method="POST">
        <input type="text" placeholder="name" name="name" id="name"><br><br>
        <input type="text" placeholder="surname"  name="surname" id="surname"><br><br>
        <input type="submit" value="Submit">
    </form> -->
    <!-- form section -->
    <!-- <div class="loader"></div>  -->
    <section id="contact">
        <div class="container-lg bg-light mt-4">
            <div class="text-center">
                <h2 id="title">Credit Card</h2>
                <p class="lead">Veuillez remplir ce formulaire...</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <form id="form" action="/api_py/controller.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="chang_nbre_trans" class="form-label">
                                    Changement du nombre de Transaction(T4
                                    par rapport au T)</label>
                                <div class="input-group mb-2">
                                    <input autofocus required name="chang_nbre_trans" class="form-control"
                                        id="chang_nbre_trans" placeholder="2.333" type="number" step=0.01>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="mont_total_trans" class="form-label">Montant Total
                                    de la transaction (12
                                    derniers
                                    mois)</label>
                                <div class="input-group mb-4">
                                    <input required id="mont_total_trans" name="mont_total_trans" class="form-control"
                                        placeholder="1887" type="number" step=0.01>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Solde Renouvelable Total sur la carte
                                    crédit</label>
                                <div class="input-group mb-4">
                                    <input required id="solde_renouv_total" name="solde_renouv_total"
                                        class="form-control" placeholder="864" type="number" step=0.01>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Nombre Total de produit détenus par le
                                    client</label>
                                <div class="input-group mb-4">
                                    <input required id="nbre_total_prod" name="nbre_total_prod" class="form-control"
                                        placeholder="4" type="number" step=0.01>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Nombre total de Transaction(12 derniers
                                    mois)</label>
                                <div class="input-group mb-4">
                                    <input required id="nbre_total_trans" name="nbre_total_trans" class="form-control"
                                        placeholder="20" type="number" step=0.01>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Nombre de Contact au cours des 12 derniers
                                    mois</label>
                                <div class="input-group mb-4">
                                    <input required id="nbre_contac" name="nbre_contact_12" class="form-control"
                                        placeholder="2" type="number" step=0.01>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <label for="subject" class="form-label">Changement du Montant de la Transaction (T4 par
                                    rapport
                                    au T1)</label>
                                <div class="input-group mb-4">
                                    <input required id="chang_mont_trans" name="chang_mont_trans" class="form-control"
                                        placeholder="2.594" type="number" step=0.01>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="subject" class="form-label">Nom et Prénom du Client</label>
                                <div class="input-group mb-4">
                                    <input id="nom_prenom" name="nom_prenom" class="form-control"
                                        placeholder="kevin KONE" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 text-center lg">
                            <button id="submit" type="submit" class="btn btn-secondary btn-lg">
                                <!-- <i class="bi bi-check-circle me-2"></i> -->
                               <span id="loader" class="bi bi-check-circle me-2" role="status" aria-hidden="true"></span>
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end form section -->
    <?php 

         $input_name = (array_key_exists('name', $_POST)) ? $_POST['name'] : "";
         $input_surname = (array_key_exists('surname', $_POST)) ? $_POST['surname'] : "";

        //  echo 'Nom : '.$input_name.'<br/>';
        //  echo 'Prénom :'.$input_surname;
        if($input_name != '' and $input_surname != '')
        {
            $api_link = 'http://card_credit.test/api_py/info.py?nom='.$input_name	.'&prenom='.$input_surname;
            $api_content = file_get_contents($api_link);
            echo $api_content;
        }
    ?>
</body>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- main.js -->
<script src="/js/main.js" lang="javascript"></script>
</html>