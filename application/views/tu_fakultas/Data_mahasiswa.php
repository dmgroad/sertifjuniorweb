<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard TU Fakultas</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/fontawesome-free/css/all.min.css" rel="stylesheet'); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('TU_Fakultas'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TU Fakultas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('TU_Fakultas'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('TU_Fakultas/mahasiswa'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>CRUD Mahasiswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <img src="<?= base_url(); ?>assets/img/logo_perusahaan/L_Rasita.png" class="mr-2" alt="" style="width:100px;">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $username; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Main Content -->
                <div class="container-fluid">
                    <!-- ---------------------------------------------------------------------------------------- -->
                    <!-- Main Card -->

                    <div class="card border-dark shadow bg-gray-100">
                        <h1 class="mx-4 mt-4 text-center">CRUD Mahasiswa</h1>
                        <hr class="mx-4">
                        <ol class="breadcrumb mx-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('TU_Fakultas'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-font"></i> CRUD Mahasiswa</li>
                        </ol>

                        <div class="mx-4">
                            <?= $this->session->flashdata('message'); ?>
                        </div>

                        <!-- List Running Text -->
                        <div class="card shadow m-4">
                            <div class="mx-4">
                                <hr />
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMahasiswa">Insert Data Mahasiswa</button>
                            </div>


                            <div class="card-body bg-white">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Alamat</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Gender</th>
                                                <th>Agama</th>
                                                <th>Fakultas</th>
                                                <th>Prodi</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data_mahasiswa as $dm) : ?>
                                                <tr>
                                                    <td><?= $dm['nim']; ?></td>
                                                    <td><?= $dm['nama']; ?></td>
                                                    <td><?= $dm['alamat']; ?></td>
                                                    <td><?= $dm['tanggal_lahir']; ?></td>
                                                    <td><?= $dm['gender']; ?></td>
                                                    <td><?= $dm['agama']; ?></td>
                                                    <td><?= $dm['fakultas']; ?></td>
                                                    <td><?= $dm['prodi']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $dm['nim']; ?>">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $dm['nim']; ?>">Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal Edit Running Text  -->
                                                <div class="modal fade" id="modalEdit<?= $dm['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="<?= base_url('TU_Fakultas/mahasiswa'); ?>" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">NIM</label>
                                                                        <input type="text" class="form-control" id="idEditMhs" name="idEditMhs" value="<?= $dm['nim']; ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Nama</label>
                                                                        <input type="text" class="form-control" id="namaMhs" name="namaMhs" value="<?= $dm['nama']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Alamat</label>
                                                                        <input type="text" class="form-control" id="alamatMhs" name="alamatMhs" value="<?= $dm['alamat']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Tanggal Lahir :</label>
                                                                        <input class="form-control" type="date" value="<?= $dm['tanggal_lahir']; ?>" id="lahirMhs" name="lahirMhs" required>
                                                                    </div>
                                                                    <fieldset class="form-group">
                                                                        <div class="row">
                                                                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                                                            <div class="col-sm-10">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="genderMhs" id="genderMhsPria" value="Pria" checked>
                                                                                    <label class="form-check-label" for="gridRadios1">
                                                                                        Pria
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="genderMhs" id="genderMhsWanita" value="Wanita">
                                                                                    <label class="form-check-label" for="gridRadios2">
                                                                                        Wanita
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Agama</label>
                                                                        <select class="custom-select" id="agamaMhs" name="agamaMhs" required>
                                                                            <option></option>
                                                                            <option value="Islam">Islam</option>
                                                                            <option value="Protestan">Protestan</option>
                                                                            <option value="Katolik">Katolik</option>
                                                                            <option value="Hindu">Hindu</option>
                                                                            <option value="Buddha">Buddha</option>
                                                                            <option value="Khonghucu">Khonghucu</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Fakultas</label>
                                                                        <input type="text" class="form-control" id="fakultasMhs" name="fakultasMhs" value="<?= $fakultas['nama_fakultas']; ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="">Prodi</label>
                                                                        <select class="custom-select" id="prodiMhs" name="prodiMhs" required>
                                                                            <option></option>
                                                                            <?php foreach ($prodi_user as $p) : ?>
                                                                                <option value="<?= $p['nama_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group form-check">
                                                                        <input type="checkbox" class="form-check-input" id="checkKonfirmasi" name="checkKonfirmasi" required>
                                                                        <label class="form-check-label" for="checkKonfirmasi">Lakukan Edit</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Delete  -->
                                                <div class="modal fade" id="modalDelete<?= $dm['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="<?= base_url('TU_Fakultas/mahasiswa'); ?>" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="kodeDelete">NIM Mahasiswa yang akan dihapus :</label>
                                                                        <input type="text" class="form-control" id="kodeDelete" name="kodeDelete" value="<?= $dm['nim']; ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group form-check">
                                                                        <input type="checkbox" class="form-check-input" id="checkKonfirmasi" name="checkKonfirmasi" required>
                                                                        <label class="form-check-label" for="checkKonfirmasi">Lakukan Delete</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ---------------------------------------------------------------------------------------- -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- --------------------------------------Additional------------------------------------------ -->

            <!-- Modal Insert Mahasiswa  -->
            <div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="<?= base_url('TU_Fakultas/mahasiswa'); ?>" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-check-label" for="">NIM</label>
                                    <input type="text" class="form-control" id="idTambahMhs" name="idTambahMhs" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Nama</label>
                                    <input type="text" class="form-control" id="namaMhs" name="namaMhs" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Alamat</label>
                                    <input type="text" class="form-control" id="alamatMhs" name="alamatMhs" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Tanggal Lahir</label>
                                    <input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="lahirMhs" name="lahirMhs" required>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="genderMhs" id="genderMhsPria" value="Pria" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Pria
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="genderMhs" id="genderMhsWanita" value="Wanita">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Wanita
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Agama</label>
                                    <select class="custom-select" id="agamaMhs" name="agamaMhs" required>
                                        <option></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Fakultas</label>
                                    <input type="text" class="form-control" id="fakultasMhs" name="fakultasMhs" value="<?= $fakultas['nama_fakultas']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="">Prodi</label>
                                    <select class="custom-select" id="prodiMhs" name="prodiMhs" required>
                                        <option></option>
                                        <?php foreach ($prodi_user as $p) : ?>
                                            <tr>
                                                <option value="<?= $p['nama_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                            </tr>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="checkKonfirmasi" name="checkKonfirmasi" required>
                                    <label class="form-check-label" for="checkKonfirmasi">Tambah Mahasiswa</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sertifikasi 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda ingin logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('Account/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin2/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/sbadmin2/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/sbadmin2/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/js/demo/chart-pie-demo.js'); ?>"></script>

</body>

</html>