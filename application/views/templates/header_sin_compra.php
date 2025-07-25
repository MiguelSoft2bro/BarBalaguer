<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="assets/images/favicon.png" sizes="32x32" type="image/png">
        <title>Apadrina siglos de Olivar - Señorio de Guadalest </title>

        <link rel="stylesheet" href="<?= base_url()."assets/css/icons.min.css" ?>  ">
        <link rel="stylesheet" href="<?= base_url()."assets/css/bootstrap.min.css" ?>  "> 
        <link rel="stylesheet" href="<?= base_url()."assets/css/bootstrap-select.min.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/animate.min.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/owl.carousel.min.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/fancybox.min.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/perfect-scrollbar.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/slick.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/style.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/responsive.css" ?>">
        <link rel="stylesheet" href="<?= base_url()."assets/css/color.css" ?>">
     

        <script src="<?=  base_url()."assets/js/functions.js" ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  


        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" href=" <?= base_url()."assets/css/revolution/settings.css" ?>">
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" href=" <?= base_url()."assets/css/revolution/layers.css" ?>">
     
     
        <link rel="stylesheet" href=" <?= base_url()."assets/css/revolution/navigation.css" ?>">
    </head>

  <style>



@keyframes rotate {
    0% {
        transform: rotateY(0deg);
    }
    25% {
        transform: rotateY(180deg);
    }
    50% {
        transform: rotateY(360deg);
    }
    
    75% {
        transform: rotateY(360deg);
    }
    100% {
        transform: rotateY(360deg);
    }
}

.rotateImage {
    animation: rotate 5s infinite linear;
}


  </style>


    <body itemscope>
        <main>
        <div class="page-loader">
    <div class="loader">
        <div class='loader-style-1 panelLoad' style=" justify-content: center; align-items: center;">
            <img class="img-fluid rotateImage" src="<?= base_url()."/assets/images/logo_senorio.png" ?>">
           
        </div>
    </div>
</div><!-- Page Loader -->
            <header class="style4 stick flex">
                <div class="container">
                    <div class="wb-lgmnu-wrp flex">
                        <div class="logo"><a href="index.html" title="Home" itemprop="url"><img src="assets/images/logo2.png" alt="logo2.png" itemprop="image"></a></div><!-- Logo -->
                        <div class="tp-scl">
                            <a href="https://www.facebook.com/senoriodeguadalest/" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/senoriodeguadalest/?hl=es" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://es.linkedin.com/posts/grupovalbaral_marketing-aove-activity-6897132799225405440-xU5Y?trk=public_profile_like_view" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-linkedin"></i></a>
                          
                        </div>
                        <nav>
                            <div>
                                <ul class="active">
                                    <li class="menu-item-has-children"><a href="<?= base_url() ?>" title="" itemprop="url">Inicio</a>
                                        
                                    </li>
                                    <li class="menu-item-has-children"><a href="<?= base_url()."olivos" ?>" title="" itemprop="url">Olivos</a>
                                
                                    </li>
                                    <?php 
            
                     
	        if ($this->session->userdata('loged') ==  null) { ?>
                            <li class="menu-item-has-children"><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Padrinos</a></li>

                        <?php }else{ ?>    
                            <li class="menu-item-has-children"><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Tu Area</a></li>

                        <?php } ?>
                                          <li><a  href="<?= base_url('contacto') ?>"  title="" itemprop="url">Contacto</a></li>
                                   
                                </ul>
                               
                             
                            </div>
                        </nav>
                    </div><!-- Logo Menu Wrap -->
                </div>
            </header><!-- Header -->
            <div class="sticky-header flex">
                <div class="container">
                    <div class="wb-lgmnu-wrp flex justify-content-between">
                    <div class="logo"><a href="index.html" title="Home" itemprop="url"><img src="assets/images/logo2.png" alt="logo2.png" itemprop="image"></a></div><!-- Logo -->
                        <nav>
                            <div>
                                <ul>
                                <li class="menu-item-has-children"><a href="<?= base_url() ?>" title="" itemprop="url">Inicio</a>
                                        
                                        </li>
                                        <li class="menu-item-has-children"><a href="<?= base_url()."olivos" ?>" title="" itemprop="url">Olivos</a>
                                    
                                        </li>
                                      
                                        <?php 
            
                     
	        if ($this->session->userdata('loged') ==  null) { ?>
                            <li class="menu-item-has-children"><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Padrinos</a></li>

                        <?php }else{ ?>    
                            <li class="menu-item-has-children"><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Tu Area</a></li>

                        <?php } ?>
                                              <li><a  href="<?= base_url('contacto') ?>" title="" itemprop="url">Contacto</a></li>


                                              
                                </ul>
                            </div>
                        </nav>
                    </div><!-- Logo Menu Wrap -->
                </div>
            </div><!-- Sticky Header -->

            
            <style>
  

    .bottom-div {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        text-align: center;
    }

    .bottom-div img {
        display: block;
        margin: 0 auto;
    }
</style>
            <div class="rspns-hdr">
                <div class="rspns-lg-mnu-br">
                    <div class="container">
                        <div class="logo"><a href="index.html" title="Home" itemprop="url"><img src="assets/images/logo2.png" alt="logo2.png" itemprop="image"></a></div>
                        <span class="rspns-mnu-btn"><i class="fa fa-align-justify"></i></span>
                    </div>
                    <div class="rspns-mnu" style="background:#00c674 !important">
                        <span class="rspns-cls-btn"><i class="fa fa-times"></i></span>
                        <ul>
                        <li ><a href="<?= base_url() ?>" title="" itemprop="url">Inicio</a>
                                        
                                        </li>
                                        <li ><a href="<?= base_url()."olivos" ?>" title="" itemprop="url">Olivos</a>
                                    
                                        </li>
                                        <?php 
            
                     
	        if ($this->session->userdata('loged') ==  null) { ?>
                            <li ><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Padrinos</a></li>

                        <?php }else{ ?>    
                            <li ><a  href="<?= base_url('areaPadrinos')?>" itemprop="url">Tu Area</a></li>

                        <?php } ?>
                                              <li><a  href="<?= base_url('contacto') ?>"  title="" itemprop="url">Contacto</a></li>


                                              
                        </ul>

                        <div class="bottom-div">

<img src="assets/images/logo_senorio.png" alt="logo_senorio.png" itemprop="image">

</div>


                    </div>
                </div>
                
            </div><!-- Responsive Header -->