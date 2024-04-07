<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">HOME</div>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    DASHBOARD
                </a>
                <!-- only keuangan and admin -->
                <?php if (in_groups('keuangan') || in_groups('admin')) : ?>
                    <div class="sb-sidenav-menu-heading">Keuangan</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesKasObvan" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        KAS-OBVAN
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePagesKasObvan" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">

                                Kas-Rutin
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                Kas-OB
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                <?php endif; ?>
                <!-- end only keuangan -->
                <!-- only user and admin and keuangan -->
                <?php if (in_groups('user') || in_groups('admin') || in_groups('keuangan')) : ?>
                    <!-- show surat tugas -->
                    <div class="sb-sidenav-menu-heading">User</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesUser" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        PERSONAL
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePagesUser" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="<?= base_url() ?>surat-tugas">
                                Surat Tugas
                            </a>
                            <!-- <form action="<?= base_url() ?>surat-tugas/shifting/<?= user_id(); ?>" method="post" class="d-none">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn"><i class="fa-regular"></i> Surat Tugas Shifting</button>
                            </form> -->
                         
                            <a class="nav-link" href="<?= base_url() ?>surat-tugas/shifting/<?= user_id(); ?>">
                                Surat Tugas Shifting
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>surat-tugas/lembur/<?= user_id(); ?>">
                                Surat Tugas Lembur
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>user/setting-data-user">
                                Setting Data User
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>user/change-password/<?= user_id(); ?>">
                                Change Password
                            </a>
                        </nav>
                    </div>
                    <!-- end surat tugas -->
                    <div class="sb-sidenav-menu-heading">SERVICES</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesPeralatanKeluar" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        LAYANAN
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePagesPeralatanKeluar" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="<?= base_url() ?>out-broadcast">
                                Dinas Out Broadcast-(OB)
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>dinas-shifting">
                                Dinas Shifting & Lembur
                            </a>
                            <!-- <a class="nav-link" href="<?= base_url() ?>dinas-lembur">
                            Dinas Lembur
                        </a> -->
                            <a class="nav-link" href="<?= base_url() ?>peminjaman-alat">
                                Peminjaman Alat
                            </a>
                        </nav>
                    </div>
                <?php endif; ?>
                <!-- end only user and admin and keuangan-->

                <!-- only admin -->
                <?php if (in_groups('admin')) : ?>
                    <div class="sb-sidenav-menu-heading">MASTER DATA</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesMasterData" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        MASTER DATA
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePagesMasterData" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="<?= base_url() ?>admin/inventaris">
                                Data-Inventaris
                            </a>
                            <a class="nav-link collapsed" href="<?= base_url() ?>admin/status-dinas-lembur-shifting">
                                Status Dinas Shifting/Lembur
                            </a>
                            <a class="nav-link collapsed" href="<?= base_url() ?>admin/status-kategori-out-broadcast">
                                Status Out Broadcast
                            </a>
                        </nav>
                    </div>
                <?php endif; ?>
                <!-- end only admin -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages2">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Coming Soon
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Coming Soon
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Coming Soon
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            This Users OBVAN
        </div>
    </nav>
</div>