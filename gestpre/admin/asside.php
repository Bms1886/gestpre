<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- Accueil btn -->
    <ul class="navbar-nav flex-fill w-100 mb-2 mt-5">
      <a href="./dashboard.php#" class="nav-link">
        <i class="fe fe-home fe-16"></i>
        <span class="ml-3 item-text  active">Accueil</span>
      </a>
    </ul>
    <!-- fin Accueil btn -->

    <!-- Etudiants btn -->
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-users fe-16"></i>
          <span class="ml-3 item-text ">Etiduants</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
          <li class="nav-item">
            <a class="nav-link pl-3" href="./list_etd.php"><span class="ml-1 item-text">Liste des étudiants</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="addetu.php#" id="btnaddetudiant">
              <i class="fe fe-plus fe-15"></i>
              <span class="ml-1 item-text">Ajouter un étudiant</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- fin Etudiants btn -->

      <!-- Matieres btn -->
      <li class="nav-item dropdown mb-10">
        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-book-open fe-16"></i>
          <span class="ml-3 item-text">Matieres</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
          <li class="nav-item">
            <a class="nav-link pl-3" href="liste_mat.php#"><span class="ml-1 item-text">Liste des matieres</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3 " href="addmat.php#" id="btnaddetudiant">
              <i class="fe fe-plus fe-15"></i>
              <span class="ml-1 item-text">Ajouter une matiere</span>
            </a>
          </li>
        </ul>
        <!--fin Matieres btn -->
      </li>
      <!--fin Matieres btn -->

      <!-- risepresence -->
      <ul class="navbar-nav flex-fill w-100 mb-20 ">
        <a href="verif_pre.php#" class="nav-link">
          <i class="fe fe-search fe-16"></i>
          <span class="ml-3 item-text  active">Verifier une présence</span>
        </a>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-20 ">
        <a href="prise_presence.php#" class="nav-link">
          <i class="fe fe-edit-2 fe-16"></i>
          <span class="ml-3 item-text  active">Prise de présence</span>
        </a>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-20 ">
        <a href="addadmin.php#" class="nav-link">
          <i class="fe fe-user-plus fe-16"></i>
          <span class="ml-3 item-text active">Ajouter un administrateur</span>
        </a>
      </ul>
      <!-- fin prisepresence btn -->
      <div class="btn-box w-100 mt-auto mb-1 ">
        <a href="../index.php" target="_blank" class="btn mb-2 btn-danger btn-lg btn-block">
          <i class=""></i><span class="small">Se déconnecter</span>
        </a>
      </div>
  </nav>
</aside>
