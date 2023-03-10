<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Kokyo Complaints</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 d-flex align-items-center">
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#report">Lapor</a></li>
                        <?php if($_SESSION){?>
                            <li class="nav-item"><a href="<?= BASE_URL ?>/auth" class="btn btn-primary">Logout</a></li>
                            <?php } else {?>
                                <li class="nav-item"><a href="<?= BASE_URL ?>/auth" class="btn btn-primary">Login</a></li> 
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>