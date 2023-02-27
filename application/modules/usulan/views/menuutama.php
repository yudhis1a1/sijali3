<li>
    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>usulan" aria-expanded="false"><i class="fa fa-lg fa-fw fa-home"></i><span class="hide-menu">Beranda</span></a>

</li>
<?php
$role = $this->session->userdata('role');
$nama = $this->session->userdata('username');
$menus = $this->db->query("SELECT a.system_id, a.system_name, a.system_label FROM system_information a 
            JOIN system_module b ON a.system_id = b.system_id 
            JOIN sub_system_module c ON b.module_id = c.module_id
            JOIN user_access d ON d.sub_module_id = c.sub_module_id JOIN role_akses e  ON a.`system_id`=e.system_id JOIN users f on e.role_id=f.role_id WHERE d.user_id='bram' and e.role_id='$role' GROUP BY a.system_id")->result();

foreach ($menus as $menu) {
    //buat menu depan
?>
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <?php
            // $users = $this->db->query("SELECT role_id FROM users")->result();
            if (($menu->system_id) == '1') {
                echo " <i class='fa fa-lg fa-fw fa-qrcode'></i> ";
            } elseif (($menu->system_id) == '2') {
                echo " <i class='fa fa-lg fa-fw fa-user-o'></i> ";
            } elseif (($menu->system_id) == '3') {
                echo " <i class='fa fa-lg fa-fw fa-user-circle'></i> ";
            } elseif (($menu->system_id) == '4') {
                echo " <i class='fa fa-lg fa-fw fa-user-circle-o'></i> ";
            } elseif (($menu->system_id) == '5') {
                echo " <i class='fa fa-lg fa-fw fa-refresh'></i> ";
            } elseif (($menu->system_id) == '6') {
                echo " <i class='fa fa-lg fa-fw fa-key'></i> ";
            } elseif (($menu->system_id) == '7') {
                echo " <i class='fa fa-lg fa-fw fa-qrcode'></i> ";
            } elseif (($menu->system_id) == '8') {
                echo " <i class='fa fa-lg fa-fw fa-qrcode'></i> ";
            } elseif (($menu->system_id) == '9') {
                echo " <i class='fa fa-lg fa-fw fa-qrcode'></i> ";
            }
            ?>
            <span class="hide-menu">
                <?= $menu->system_label ?></span></a>
        <ul aria-expanded="false" class="collapse">
            <?php

            $submenus = $this->db->query("SELECT a.system_name,b.module_name,c.sub_module_name,c.menu_name FROM system_information a 
				JOIN system_module b ON a.system_id = b.system_id 
				JOIN sub_system_module c ON b.module_id = c.module_id
				JOIN user_access d ON d.sub_module_id = c.sub_module_id
				 WHERE b.system_id ='$menu->system_id' and d.user_id='bram'")->result();

            foreach ($submenus as $submenu) {
                //buat sub menu
            ?>
                <li class="">
                    <a href="<?php echo base_url() .  strtolower($submenu->system_name . '/' .
                                    $submenu->module_name . '/' .
                                    $submenu->sub_module_name) ?>"><span class="menu-item-parent"><i class="fa fa-file-pdf-o"></i> <?= $submenu->menu_name ?> </span></a>
                </li>
            <?php }  ?>

        </ul>
    </li>

<?php }  ?>

<?php if ($role == '6') { ?>
    <li>
        <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>ketenagaan/ketenagaan/data_dosen" aria-expanded="false"><i class="fa fa-lg fa-fw fa-user-circle"></i><span class="hide-menu">Update Dosen</span></a>
    </li>
<?php } ?>
<li>
    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>usulan/usulan/logout" aria-expanded="false"><i class="fa fa-lg fa-fw fa-sign-out"></i><span class="hide-menu">Keluar</span></a>
</li>