<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #0071c5!important;">
        <a class="navbar-brand fac" href="<?= url() ?>index.php">
            <img class="mr-2" src="<?= url() ?>img/intel-header-logo.svg" style="height: 35px;">
            FPGA Tools
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= navbar_active(["index.php"]) ? "active" : "" ?>">
                    <a
                            class="nav-link <?= navbar_active(["index.php"]) ? "active" : "" ?>"
                            href="<?= url() ?>index.php"
                    >
                        主頁
                    </a>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link <?= navbar_active(["pin_coverter.php"]) ? "active" : "" ?>"
                            href="<?= url() ?>components/pin_coverter.php"
                    >
                        腳位轉換器
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                            class="nav-link <?= navbar_active(["in2yung.php", "in2yung_pro.php"]) ? "active" : "" ?> dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                    >
                        CC/CA 轉換
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= url() ?>components/in2yung.php">0轉1, 1轉0</a>
                        <a class="dropdown-item" href="<?= url() ?>components/in2yung_pro.php">程式碼直接轉換　
                            <span class="badge badge-pill badge-primary-outline">Pro</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a
                            class="nav-link <?= navbar_active([""]) ? "active" : "" ?> dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                    >
                        組件
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            foreach(navbar_components() as $component) {
                        ?>
                             <a class="dropdown-item" href="<?= url() ?>components/<?= $component["url"] ?>">
                                 <?= $component["name"] ?>
                             </a>
                        <?php
                            }
                        ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a
                            class="nav-link <?= navbar_active(["big5_code_viewer.php", "big5_code_converter.php"]) ? "active" : "" ?> dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                    >
                        Big5 處理
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= url() ?>components/big5_code_viewer.php">
                            Big5 Machine &nbsp;
                            <span class="badge badge-pill badge-primary-outline">Mini</span>
                        </a>
                        <a class="dropdown-item" href="<?= url() ?>components/big5_code_converter.php">
                            Big5 Machine SIVS CHC EDU ver.　
                            <span class="badge badge-pill badge-primary-outline">Pro Max</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
