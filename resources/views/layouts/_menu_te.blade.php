<ul class="nav nav-sidebar-menu sidebar-toggle-view">
    <li class="nav-item">
        <a href="{{route('enseignant.dashboard')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Mes Informations</span></a>
    </li>
    <li class="nav-item ">
        <a href="{{route('t.eleves')}}" class="nav-link"><i class="flaticon-classmates"></i><span>Mes Elèves</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('t.enseignants')}}" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Mes Camarades</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('t.horaires')}}" class="nav-link"><i class="flaticon-calendar"></i><span>Mes Horaires
            </span></a>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Notes</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="{{route('fiches.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Fiche de cotation
                </a>
            </li>
        </ul>
    </li>
</ul>