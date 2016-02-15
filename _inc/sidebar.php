<aside id="sidebar">
                <div class="sidebar-inner c-overflow">
                    <div class="profile-menu">
                        <a href="">
                            <div class="profile-pic">
                                <img src="img_karyawan/<?php echo $_SESSION['photo_karyawan']; ?>" alt="">
                            </div>

                            <div class="profile-info">
                                <?php echo $_SESSION['nama_karyawan']; ?>

                                <i class="md md-arrow-drop-down"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="profile-about.html"><i class="md md-person"></i> View Profile</a>
                            </li>
                            <li>
                                <a href=""><i class="md md-settings-input-antenna"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href=""><i class="md md-settings"></i> Settings</a>
                            </li>
                            <li>
                                <a href="logoutProses.php"><i class="md md-history"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li <?php if(@$_GET['p']==null) echo "class='active'"; ?>><a href="?"><i class="md md-home"></i> Dashboard</a></li>
                        <li <?php if(@$_GET['p']=='pegawai') echo "class='active'"; ?>><a href="?p=pegawai"><i class="md md-format-underline"></i> Pegawai</a></li>
                        <li class="sub-menu <?php if(@$_GET['p']=='dynamic_nasabah' OR @$_GET['p']=='dynamic_tambah_nasabah' OR @$_GET['p']=='dynamic_variable') echo 'active toggled'; ?> ">
                            <a href=""><i class="md md-swap-horiz"></i> Dyamic Data</a>
                            <ul>
                                <li <?php if(@$_GET['p']=='dynamic_nasabah') echo "class='active'"; ?>><a href="?p=dynamic_nasabah">Dynamic Nasabah</a></li>
                                <li <?php if(@$_GET['p']=='dynamic_variable') echo "class='active'"; ?>><a href="?p=dynamic_variable">Dynamic Variable</a></li>
                            </ul>
                        </li>   
                        <li class="sub-menu <?php if(@$_GET['p']=='nasabah' OR @$_GET['p']=='blacklist_nasabah' OR @$_GET['p']=='tambah_nasabah') echo 'active toggled'; ?> ">
                            <a href=""><i class="md md-now-widgets"></i> Nasabah</a>
                            <ul>
                                <li <?php if(@$_GET['p']=='nasabah') echo "class='active'"; ?>><a href="?p=nasabah">Data Nasabah</a></li>
                                <li <?php if(@$_GET['p']=='blacklist_nasabah') echo "class='active'"; ?>><a href="?p=blacklist_nasabah">BlackList Nasabah</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu <?php if(@$_GET['p']=='c45' OR @$_GET['p']=='perhitungan_c45' OR @$_GET['p']=='pohon_keputusan') echo 'active toggled'; ?> ">
                            <a href=""><i class="md md-view-list"></i>Seleksi</a>
                            <ul>
                                <li <?php if(@$_GET['p']=='c45') echo "class='active'"; ?>><a href="?p=c45">Proses C4.5</a></li>
                                <li <?php if(@$_GET['p']=='perhitungan_c45') echo "class='active'"; ?>><a href="?p=perhitungan_c45">Perhitungan C4.5</a></li>
                                <li <?php if(@$_GET['p']=='pohon_keputusan') echo "class='active'"; ?>><a href="?p=pohon_keputusan">Pohon Keputusan</a></li>
                            </ul>
                        </li>
                        <li <?php if(@$_GET['p']=='prediksi') echo "class='active'"; ?>><a href="?p=prediksi&id=0"><i class="md md-today"></i> Prediksi</a></li>
                        <li <?php if(@$_GET['p']=='explode') echo "class='active'"; ?>><a href="?p=explode"><i class="md md-today"></i> Explode</a></li>
                    </ul>
                </div>
            </aside>