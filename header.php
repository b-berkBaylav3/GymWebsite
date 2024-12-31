

<!-- Header Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="index.php?sayfa=anasayfa" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center <?= $sayfa_id == 'anasayfa' ? 'active' : '' ?>">
                <h1 class="m-0 display-4 text-primary text-uppercase">Rise Gym</h1>
            </a>
        </div>
        <div class="col-lg-9">
           
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                <a href="anasayfa.php" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary text-uppercase">Rise Gym</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                    <a href="index.php?sayfa=anasayfa" class="nav-item nav-link <?= $sayfa_id == 'anasayfa' ? 'active' : '' ?>">Anasayfa</a>
                    <a href="index.php?sayfa=hakkinda" class="nav-item nav-link <?= $sayfa_id == 'hakkinda' ? 'active' : '' ?>">Hakkımızda</a>
                    <a href="index.php?sayfa=paketler" class="nav-item nav-link <?= $sayfa_id == 'paketler' ? 'active' : '' ?>">Paketler</a>
                    <a href="index.php?sayfa=grup_dersleri" class="nav-item nav-link <?= $sayfa_id == 'grup_dersleri' ? 'active' : '' ?>">Grup Dersleri</a>
                    <a href="index.php?sayfa=personel" class="nav-item nav-link <?= $sayfa_id == 'personel' ? 'active' : '' ?>">Antrenörler</a>
                    <a href="index.php?sayfa=iletisim" class="nav-item nav-link <?= $sayfa_id == 'iletisim' ? 'active' : '' ?>">İletişim</a>
                    <a href="index.php?sayfa=rapor" class="nav-item nav-link <?= $sayfa_id == 'rapor' ? 'active' : '' ?>">Rapor</a>
                       

                    </div>
                    <a href="index.php?sayfa=iletisim" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block <?= $sayfa_id == 'iletisim' ? 'active' : '' ?>">İletişime Geç</a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

