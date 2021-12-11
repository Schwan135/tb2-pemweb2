<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Edit Profil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="tambah_link" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Tambah Daftar Link</p>
          </a>
        </li>
      </ul>
    </li>
    </li>
    <li class="nav-header">Daftar Link</li>
    <?php
    $data=$this->link_model->get_data($profil->email);
    foreach ($data as $row) {
    ?>
    <li class="nav-item">
      <a href="<?php
      echo 'lihat_link/u/'.$row->id; 
      ?>" class="nav-link" target="_blank">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
          <?php 
          echo $row->id; 
          ?>
          <span class="badge badge-info right">-</span>
        </p>
      </a>
    </li>
    <?php
    }
    ?>
    <li class="nav-item">
      <a href="login/drop" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
          LOGOUT
        </p>
      </a>
    </li>
  </ul>
</nav>