<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<h3>Selamat Datang, <?= session()->get('full_name'); ?> </h3>

<?= $this->endSection(); ?>
