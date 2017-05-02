<?php
require_once 'vendor/autoload.php';

$post = [];
$errors = [];

if(!empty($_POST)){
    $post = array_map('trim', array_map('strip_tags', $_POST));

    if(strlen($post['name']) < 3 && strlen($post['name']) > 20){
        $errors[] = 'Votre nom doit être compris entre 3 et 20 caratères y compris';
    }

    if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){ 
        $errors[] = 'Votre email est invalide'; 
    }

    if(strlen($post['message']) < 8){
        $errors[] = 'Votre message doit être supérieur à 8 caratères';
    }

    if(count($errors) === 0){

        $sendMail = new PHPMailer;

        $sendMail->isSMTP();                                      
        $sendMail->Host = 'smtp.gmail.com';                                   // Hôte du SMTP
        $sendMail->SMTPAuth = true;                                             // SMTP Authentification
        $sendMail->Username = 'cecilelafont@emaginetapub.com'; //Username                        // SMTP username
        $sendMail->Password = 'mdp'; //mot de passe                                     // SMTP password
        $sendMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
        $sendMail->Port = 587;                                                  // TCP port to connect to
        $sendMail->CharSet = 'UTF-8';

        $sendMail->setFrom($post['email'], $post['name']);              //Expéditeur

        $sendMail->addAddress('contact@emaginetapub.com', 'Cécile');        //$user['email']
        //$sendMail->addCC('');                     //Copie envoyer à l'adresse souhaitée du mail

        $sendMail->Subject = 'Nouvelle demande depuis Emaginetapub.com';
        $sendMail->Body    = $post['message']; //On envoi le message éventuellement en HTML
        $sendMail->AltBody = $post['message']; //On envoi le message sans HTML

        if(!$sendMail->send()){
            $errors[] = 'échec lors de l\'envoie du mail ... Veuillez réessayer.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="WEBDESIGNER DEVELOPPEUR FRONTEND BORDEAUX MONTESQUIEU GRAPHISTE Cécile Lafont">
        <meta name="author" content="Cécile Lafont">


        <title>Emagine ta pub !</title>

        <!-- Bootstrap Core CSS -->
<!--
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
-->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway+Dots|Raleway:100,200i,400,500, 600, 900,900i&subset=latin-ext" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mediaquery.css" media="screen and (min-width: 1200px), screen and (min-width: 992px), screen and (min-width: 768px), screen and (max-width: 768px)">
        <link rel="stylesheet" href="css/styles.css" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">

                <!-- div topbar-->

                <div class="row">
                    <div class="col-md-6 mylogo">CECILE LAFONT</div>
                    <div class="col-md-6 slogan text-right">Ce qui est important pour demain, c'est de vous faire connaître dès aujourd'hui !
                    </div>

                </div> <!--/ div topbar-->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <i class="btnAccueil"><a class="navbar-brand page-scroll" href="#page-top" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></i>
                        </a>
                </div> <!--navbar-header page-scroll-->

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#galerie">&#201TAPES DE CR&#201ATION</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#cv">SERVICES</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">CONTACT</a>
                        </li>
                    </ul>
                </div> <!-- /.navbar-collapse -->
            </div> <!-- /.container -->
        </nav>

        <!-- Intro Section -->

        <section id="intro" class="intro-section">
            <div id="contain" class="container">
                <div class="column">
                    <!--Colonne LOGO-->
                    <div id="collogo" class="col-xs-12 col-sm-12 col-md-3 col-lg-2"><img id="logoimg" src="img/logo-emagine-ta-pub.png" alt="logo"><br><br>
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FEmagineTaPub%2F&width=450&layout=standard&action=recommend&size=small&show_faces=false&share=false&height=35&appId" width="100%" height="40" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>            
                    </div> <!--/div colonne LOGO-->

                    <!--Colonne Description Activité-->

                    <div id="presentation" class="col-xs-12 col-sm-10 col-md-7 col-lg-9 prestations box-shadow">
                        <h1>Graphiste &amp; Webdesigner</h1>
                        <h2>Conseil en Communication  <mark class="sligne">Sud Bordeaux</mark> ;-&#41;</h2>
                        <p>De l'idée jusqu'au choix des outils... </p>

                        <p>
                            <strong>Création Identité Visuelle :</strong>
                            Logo | Charte graphique</p>
                        <p>

                            <strong>Création graphique Print :</strong> 
                            Cartes de visite | Dépliants | Flyers | Catalogues</p>
                        <p>

                            <strong>Création graphique Web :</strong> 
                            Site Web | Site e-commerce | Application mobile | Bouton Web animé | Bandeau pour réseaux sociaux | Fond d’écran </p>
                        <p>

                            <strong>Création graphique PLV :</strong> 
                            Agencement de stand de salon | Roll’up, kakemono, drapeau… | Packaging | Étiquette </p>
                        <p>

                            <strong>Création graphique Signalétique intérieur et extérieur : </strong>
                            Marquage sur véhicule | Aménagement boutique | Lettrage vitrine | Enseigne, panneau, bâche… </p>
                        <a class="btn btn-default page-scroll" href="#contact">Me contacter !</a>
                    </div> <!--/div colonne description activité-->

                    <!--colonne réseaux sociaux-->

                    <div id="rs" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 colrs"><h1>Suivez-moi...</h1>
                        <p class="rs">
                            <a class="btn btn-rs btn-facebook page-scroll" href="https://www.facebook.com/EmagineTaPub/" target="_blank" ><i class="fa fa-facebook fa-3x" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p class="rs">
                            <a class="btn btn-rs btn-twitter page-scroll" href="https://twitter.com/emaginetapub" target="_blank" ><i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p class="rs">
                            <a class="btn btn-rs btn-linkedin page-scroll" href="https://fr.linkedin.com/in/clafont1" target="_blank" ><i class="fa fa-linkedin fa-3x" aria-hidden="true"></i>
                            </a>
                        </p>

                        <p class="rs">
                            <a class="btn btn-rs btn-viadeo page-scroll" href="http://www.viadeo.com/p/0021l8qgc3su2eov" target="_blank" ><i class="fa fa-viadeo fa-3x" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p class="rs">
                            <a class="btn btn-rs btn-google page-scroll" href="https://plus.google.com/u/0/+C%C3%A9cileLafont" target="_blank" ><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                            </a>
                        </p>
                    </div> <!--/div réseaux sociaux-->

                </div>
            </div><!-- /div conteneur-->
        </section>

        <!-- Galerie Section -->

        <!-- model https://codepen.io/team/lincolnloop/pen/QwQwza-->
        <section id="galerie" class="galerie-section">
            <div class="container">
                    <div class="">
                        <h1>LES &#201TAPES DE CR&#201ATION</h1>
                    </div>
                    <div class="contain-galerie">
                        <div class="img-galerie">
                            <div class="cadre-imgalerie">
                                <img class="img-galerie" src="img/EMAGINE-TA-PUB-siteweb-etape-reflexion.jpg">
                            </div>
                            <ul class="details">
                                <li>description</li>
                            </ul>
                        </div>
                        <div class="img-galerie">
                            <div class="cadre-imgalerie">
                                <img class="img-galerie" src="img/EMAGINE-TA-PUB-siteweb-etape-prototype.jpg">
                            </div>
                            <ul class="details">
                                <li>description</li>
                            </ul>
                        </div>
                        <div class="img-galerie">
                            <div class="cadre-imgalerie">
                                <img class="img-galerie" src="img/EMAGINE-TA-PUB-siteweb-etape-evolution.jpg">
                            </div>
                            <ul class="details">
                                <li>description</li>
                            </ul>
                        </div>
                        <div class="img-galerie">
                            <div class="cadre-imgalerie">
                                <img class="img-galerie" src="img/EMAGINE-TA-PUB-siteweb-etape-livrables.jpg">
                            </div>
                            <ul class="details">
                                <li>description</li>
                            </ul>

                        </div>
                    </div>

            </div> <!--/div class container-->
        </section> <!-- /Galerie Section -->

        <!-- CV Section -->

        <section id="cv" class="cv-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>LES SERVICES</h1>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 boxcv">
                        GRAPHISME &amp; ILLUSTRATION :

                        <ul>
                            <li>Création de votre logo ;</li>
                            <li>adaptation de votre identité à tous les supports de communication ;</li>
                            <li>création de l’ensemble ou d’une partie de vos visuels pour vos supports de communication, aussi bien pour vos réseaux sociaux, sites Web, applications mobiles, logiciels, documents imprimés, stands évènementiels, etc.</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 boxcv">
                        DÉVELOPPEMENT &amp;  INTÉGRATION WEB :
                        <ul>
                            <li>Intégration HTML5 / CSS3 ;</li>
                            <li>développement PHP ;</li>
                            <li>Javascript ;</li>
                            <li>base de données MYSQL ;</li>
                            <li>optimisation de travail et performance Web ;</li>
                            <li>Installation de CMS et plugins type Wordpress.</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 boxcv">
                        COMMUNICATION PRINT &amp;  DIGITALE :
                        <ul>
                            <li>Analyse et propositions de solutions Web, d’impression et signalétique ;</li>
                            <li>rédaction d’un plan de communication ;</li>
                            <li>création et mise en place de tous vos outils de communication In line et Off line ;</li>
                            <li>gestion de projet et d'équipe si différents intervenants ;</li>
                            <li>mise en place des outils de mesures d’efficacité de solutions (sondage, Analytics, etc.)  ;</li>
                            <li>analyse des écarts de chiffre pour reports d'améliorations de plan de communication.</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 boxcv">
                        GESTION DE PROJET :
                        <ul>
                            <li>Élaboration du budget prévisionnel, plannings de communication ;</li>
                            <li>création des plans et maquettes publicitaires ;</li>
                            <li>mise en place des outils de mesure d'évaluation des objectifs ;</li>
                            <li>recherche et gestion des équipes de communication.</li>
                        </ul>
                        <p>Je m'assure du bon déroulement de vos projets !</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 boxcv">
                        FORMATION

                        <p>Je peux aussi vous aider à acquérir de nouvelles compétences techniques :</p>
                        <ul>
                            <li>« Bien démarrer » ou « se perfectionner » avec Photoshop, Indesign ou Illustrator.</li>
                            <li>« Des outils pour moi ! » Formation personnalisée en bureautique : Microsoft Office, le Cloud, Word, Excel, Power Point, applications mobiles etc.</li>
                        </ul>                
                    </div>
                </div>
                </section> <!--fin section cv-->

<!--             Contact Section-->

            <section id="contact" class="contact-section">
                <div class="container">
                    <div class="col-lg-12">
                        <h1>ME CONTACTER</h1>
                    </div>
                    <div class="col-lg-12">
                        
<!--                        Formulaire de contact-->
                        
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nom complet</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputname" name="name" placeholder="Prénom & Nom" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputemail" name="email" placeholder="example@domain.com" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="message" id="inputmessage" placeholder="Tapez ici votre message ..."></textarea>
                            </div>
                        </div>
<!--
                        <div class="form-group">
                            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-default">Envoyer</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <! Will be used to display an alert to the user>
                            </div>
                        </div>
                    </form>
                    </div>                
                </div> <!--/div container-->
            </section>

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Scrolling Nav JavaScript -->
            <script src="js/jquery.easing.min.js"></script>
            <script src="js/scrolling-nav.js"></script>

            </body>

        </html>
