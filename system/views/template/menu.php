<?php
$a = 'active';
$b = 'active nav-active';

$dashboard = '';
$generalenglishchildren = '';
$galeri='';
$konten='';
$info='';
$slider='';
$staff='';
$alumni='';
$peserta='';

$user = '';



switch ($menu) {
    case 'dashboard' :
        $dashboard = $a;
        break;
    case 'staff' :
        $staff = $a;
        break;
    case 'generalenglishchildren' :
        $generalenglishchildren = $a;
        break;
    case 'slider' :
        $slider = $a;
        break;
    case 'galeri':
        $galeri = $a;
        break;
    case 'konten':
        $konten = $a;
        break;
    case 'alumni':
        $alumni = $a;
        break;
    case 'peserta':
        $peserta = $a;
        break;
    case 'info':
        $info = $a;
        break;
    case 'user' :
        $user = $a;
        break;
    default :
        $dashboard = $a;
        break;
}
?>

<ul class="nav nav-pills nav-stacked nav-bracket">
    <li class="<?= $dashboard; ?>"><a href="<?= base_url(); ?>dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

<?php
if ($this->session->userdata('level') == 1) { // dokter & loket
?>
	<h5 class="sidebartitle">Gambar</h5>
    <li class="<?= $slider; ?>"><a href="<?= base_url(); ?>slider"><i class="fa fa-file"></i> <span>Slider</span></a></li>
    <li class="<?= $galeri; ?>"><a href="<?= base_url(); ?>galeri"><i class="fa fa-picture-o"></i> <span>Galeri</span></a></li>
    <li class="<?= $staff; ?>"><a href="<?= base_url(); ?>staff"><i class="fa fa-users"></i> <span>Staff</span></a></li>
    <h5 class="sidebartitle">Konten</h5>
    <li class="<?= $konten; ?>"><a href="<?= base_url(); ?>konten"><i class="fa fa-file"></i> <span>Konten</span></a></li>
    <li class="<?= $info; ?>"><a href="<?= base_url(); ?>info"><i class="fa fa-info"></i> <span>Info</span></a></li>
    <li class="<?= $alumni; ?>"><a href="<?= base_url(); ?>alumni"><i class="fa fa-check "></i> <span>Alumni</span></a></li>
    <li class="<?= $peserta; ?>"><a href="<?= base_url(); ?>peserta"><i class="fa fa-users"></i> <span>Peserta</span></a></li>
    <h5 class="sidebartitle">Settings</h5>
    <li class="<?= $user; ?>"><a href="<?= base_url(); ?>user"><i class="fa fa-user"></i> <span>User</span></a></li>
<?php
}
?>

    
</ul>