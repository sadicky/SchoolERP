<ul class="nav nav-sidebar-menu sidebar-toggle-view">
    <li class="nav-item">
        <a href="/" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
    </li>
    <li class="nav-item ">
        <a href="{{route('eleves.index')}}" class="nav-link"><i class="flaticon-classmates"></i><span>Elèves</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('enseignants.index')}}" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Enseignants</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('parents.index')}}" class="nav-link"><i class="flaticon-couple"></i><span>Parents</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('classes.index')}}" class="nav-link"><i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Classes</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('cours.index')}}" class="nav-link"><i class="flaticon-open-book"></i><span>Cours</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('horaires.index')}}" class="nav-link"><i class="flaticon-calendar"></i><span>Horaires
            </span></a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Disciplines</span></a>
    </li>
    <li class="nav-item">
        <a href="{{route('communiques.index')}}" class="nav-link"><i class="flaticon-bed"></i><span>Communiqués</span></a>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Notes</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="{{route('fiches.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Fiche de cotation
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{route('cahiers.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Cahier de notes</a>
            </li> --}}
        </ul>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Finances</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="{{route('frais.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Frais Scolaire</a>
            </li>
            <li class="nav-item">
                <a href="{{route('primes.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Primes</a>
            </li>
            <li class="nav-item">
                <a href="all-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Salaires</a>
            </li>
            <li class="nav-item">
                <a href="all-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Dépenses</a>
            </li>
            <li class="nav-item">
                <a href="all-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Dérogations</a>
            </li>
            <li class="nav-item">
                <a href="all-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Journal</a>
            </li>
        </ul>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-checklist"></i><span>Présences</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="{{route('presencee.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                    Elèves</a>
            </li>
            <li class="nav-item">
                <a href="{{route('presencep.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                    Personnels</a>
            </li>
        </ul>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Bibliothèques</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="all-book.html" class="nav-link"><i class="fas fa-angle-right"></i>
                    Livres</a>
            </li>
            <li class="nav-item">
                <a href="add-book.html" class="nav-link"><i class="fas fa-angle-right"></i>Emprunts</a>
            </li>
            <li class="nav-item">
                <a href="add-book.html" class="nav-link"><i class="fas fa-angle-right"></i>Retournés</a>
            </li>
        </ul>
    </li>
    <li class="nav-item sidebar-nav-item">
        <a href="#" class="nav-link"><i class="flaticon-settings"></i><span>Paramètres</span></a>
        <ul class="nav sub-group-menu">
            <li class="nav-item">
                <a href="exam-schedule.html" class="nav-link"><i class="fas fa-angle-right"></i>Configuration Initiale
                </a>
            </li>
            <li class="nav-item">
                <a href="exam-grade.html" class="nav-link"><i class="fas fa-angle-right"></i>Roles</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="{{route('annees.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Année Scolaire</a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Catégories Options</a>
            </li>
            <li class="nav-item">
                <a href="{{route('periodes.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Périodes</a>
            </li>
            <li class="nav-item">
                <a href="{{route('sections.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Sections</a>
            </li>
            <li class="nav-item">
                <a href="{{route('options.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Options</a>
            </li>
            <li class="nav-item">
                <a href="{{route('grades.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Grade</a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories_frais.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Catégories Frais Scolaire</a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories_primes.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Catégories Primes</a>
            </li>
        </ul>
    </li>
</ul>