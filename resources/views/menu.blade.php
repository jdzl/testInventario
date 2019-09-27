<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="https://y2u7z9e4.stackpathcdn.com/templates/rt_versla/custom/images/contractorcampus_logo-header.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">Inventario</h4>
        <p class="font-weight-light text-muted mb-0"> Sede X2</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Libros</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="{{ route('inventario')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa  fa-cubes  mr-3 text-primary fa-fw"></i>
                Todos
            </a>
    </li>
    <li class="nav-item">
    <a href="{{ route('inventario/nuevo')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Agregar Nuevo Libro
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('inventario/vender')}}"  class="nav-link text-dark font-italic  bg-light">
                <i class="fa fa-tags mr-3 text-primary fa-fw"></i>
                Vender Libro
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('inventario/historial')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-line-chart  mr-3 text-primary fa-fw"></i>
                Ventas y Compras
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('inventario/search')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-search  mr-3 text-primary fa-fw"></i>
               Busquedad 2
            </a>
    </li>
  </ul>
</div>
<script>
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
</script>
<style>

.vertical-nav {
  min-width: 17rem;
  width: 17rem;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;
}

.page-content {
  width: calc(100% - 17rem);
  margin-left: 17rem;
  transition: all 0.4s;
}

/* for toggle behavior */

#sidebar.active {
  margin-left: -17rem;
}

#content.active {
  width: 100%;
  margin: 0;
}

@media (max-width: 768px) {
  #sidebar {
    margin-left: -17rem;
  }
  #sidebar.active {
    margin-left: 0;
  }
  #content {
    width: 100%;
    margin: 0;
  }
  #content.active {
    margin-left: 17rem;
    width: calc(100% - 17rem);
  }
}
</style>
<!-- End vertical navbar -->