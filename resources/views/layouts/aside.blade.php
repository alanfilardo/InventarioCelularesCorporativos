 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form 
    <form action="" method="" class="sidebar-form" autocomplete="off">
      @csrf
        <div class="input-group">
          <input id="texto" type="text" name="Buscador" class="form-control" placeholder="Buscar..." id="caja_busqueda">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">INVENTARIO</li>

        <li>
        <a href="{{route('inicio')}}">
              <i class="fa fa-home"></i> <span>Inicio</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li> 


        <li class="treeview">
            <a href="#">
              <i class="fa fa-globe" aria-hidden="true"></i> <span>Sucursales</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="header" style="color: white;">PAISES</li>
              <li><a href="{{route('paises')}}"><i class="fa fa-list-alt"></i>Listado Paises</a></li>
              <li><a href="{{route('crear_pais')}}"><i class="fa fa-plus"></i>Agregar País</a></li>
              <li class="header" style="color: white;">PROVINCIAS</li>
              <li><a href="{{route('provincias')}}"><i class="fa fa-list-alt"></i>Listado Provincias</a></li>
              <li><a href="{{route('crear_provincia')}}"><i class="fa fa-plus"></i>Agregar Provincia</a></li>
              <li class="header" style="color: white;">SUCURSALES</li>
              <li><a href="{{route('sucursales')}}"><i class="fa fa-list-alt"></i>Listado Sucursales</a></li>
              <li><a href="{{route('crear_sucursal')}}"><i class="fa fa-plus"></i>Agregar Sucursal</a></li>
            </ul>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-mobile" aria-hidden="true"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="header" style="color: white;">MARCAS</li>
            <li><a href="{{route('marcas')}}"><i class="fa fa-list-alt"></i>Listado Marcas</a></li>
            <li><a href="{{route('crear_marca')}}"><i class="fa fa-plus"></i>Agregar Marca</a></li>
            <li class="header" style="color: white;">MODELOS</li>
            <li><a href="{{route('modelos')}}"><i class="fa fa-list-alt"></i>Listado Modelos</a></li>
            <li><a href="{{route('crear_modelo')}}"><i class="fa fa-plus"></i>Agregar Modelo</a></li>
            <li class="header" style="color: white;">EQUIPOS</li>
            <li><a href="{{route('equipos')}}"><i class="fa fa-list-alt"></i>Listado Equipos</a></li>
            <!--<li><a href="{{route('stock_equipos')}}"><i class="fa fa-list-alt"></i>Listado Equipos Libres</a></li>-->
            <li><a href="{{route('crear_equipo')}}"><i class="fa fa-plus"></i>Agregar Equipo</a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-card" aria-hidden="true"></i> <span>Lineas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="header" style="color: white;">LINEAS</li>
              <li><a href="{{route('lineas')}}"><i class="fa fa-list-alt"></i>Listado Lineas</a></li>
              <li><a href="{{route('crear_linea')}}"><i class="fa fa-plus"></i>Agregar Linea</a></li>
            </ul>
          </li>

          <li class="treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Clientes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="header" style="color: white;">CLIENTES</li>
                <li><a href="{{route('clientes')}}"><i class="fa fa-list-alt"></i>Listado Clientes</a></li>
                <li><a href="{{route('crear_cliente')}}"><i class="fa fa-plus"></i>Agregar Cliente</a></li>
              </ul>
            </li>

<!-- BOTON SIMPLE EN ASIDE
       <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li> 
-->
<!-- BOTON VARIOS NIVELES EN ASIDE
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>

        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    -->

    </section>
    <!-- /.sidebar -->
  </aside>