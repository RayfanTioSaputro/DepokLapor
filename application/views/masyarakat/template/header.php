<link rel="stylesheet" href="<?= base_url() . 'assets/css/tailwind.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/css/masyarakat/style.css' ?>">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<script src="<?= base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>

<style>
    body {
        font-family: 'Mulish', sans-serif;
    }

    #snackbar {
        visibility: hidden;
        width: 40% !important;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 60px;
        transform: translate(-50%, 0);
        font-size: 17px;
    }

    @media (max-width: 992px) {
        #snackbar {
            width: 45% !important;
        }
    }

    @media (max-width: 768px) {
        #snackbar {
            width: 80% !important;
        }
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            top: 0;
            opacity: .6;
        }

        to {
            top: 80px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            top: 0;
            opacity: .6;
        }

        to {
            top: 60px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            top: 60px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            top: 60px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }
</style>

<script src="<?= base_url() . 'assets/vendor/feather-icons/feather.min.js' ?>"></script>