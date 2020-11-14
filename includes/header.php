<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($_GET['title']) ? $_GET['title'] : "FPGA Tools" ?></title>
<link rel="stylesheet" href="<?= url() ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?= url() ?>css/modal.css">
<link rel="stylesheet" href="<?= url() ?>css/style.css">
<script src="<?= url() ?>js/jquery.min.js"></script>
<script src="<?= url() ?>js/popper.min.js"></script>
<script src="<?= url() ?>js/bootstrap.min.js"></script>
<script src="<?= url() ?>js/modal.js"></script>
<style>
    body {
        min-height: calc(100% - 120px);
        /*background-image: url("*/<?//= url() ?>/*img/cropped-alexandre-debieve-561298-unsplash.jpg");*/
        /*background-position: center;*/
        /*background-repeat: no-repeat;*/
        /*background-size: cover;*/
        /*color: white;*/
        /*backdrop-filter: blur(30px) saturate(180%);*/
    }
</style>
<script>
    let api_url = "<?= url() ?>api.php";
</script>