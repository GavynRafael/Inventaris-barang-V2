<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style=" background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-boxes-stacked fa-bounce"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <span class="sidebar-brand-text-primary">Inventaris</span>
        </div>
    </a>


    <hr class="sidebar-divider">
    <!-- Query Menu -->
    <?php
    $role_id = $users['role'];
    $queryMenu = "SELECT `user_menu`.`id`,  `menu` from `user_menu`  Join `user_access_menu` on `user_menu`.`id` = `user_access_menu`.`menu_id` where `user_access_menu`.`role_id` = $role_id order by `user_access_menu`.`menu_id` asc ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading text-light">
            <?= $m['menu']; ?>
        </div>

        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = $menuId";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span style="font-size: 18px;"><?= $sm['title']; ?></span>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endforeach; ?>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span style="font-size: 18px;">logout</span>
        </a>
    </li>
    <!-- Divider -->

</ul>
<!-- End of Sidebar -->