<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/fontawesome-free/css/all.min.css" rel="stylesheet'); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet') ?>">

</head>

<body class="bg-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center bg-info">


            <div class="card o-hidden border-0 shadow-lg my-5">
                <!-- Nested Row within Card Body -->
                <div class="row" style="background: whitesmoke;">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center border-bottom-info mb-5">
                                <h1 class="h4 text-gray-900 mb-4">
                                    Selamat Datang di Halaman Login</h1>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="POST" action="<?= base_url(); ?>" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn-user btn-block" style="background: cyan;">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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

</body>

</html>