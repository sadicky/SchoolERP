<div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
    <ul class="navbar-nav">
        <li class="navbar-item header-search-bar">
            <div class="input-group stylish-input-group">
                <span class="input-group-addon">
                </span>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="navbar-item dropdown header-admin">
            <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-expanded="false">
                <div class="admin-title">
                    <h5 class="item-title">{{Auth::user()->admin->nom}}</h5>
                    <span>{{Auth::user()->role->role_name }}</span>
                    
                </div>
                <div class="admin-img">
                    <img src="assets/img/figure/admin.jpg" alt="Admin">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="item-header">
                    <h6 class="item-title">                       
                    {{Auth::user()->admin->nom}}
                    </h6>
                </div>
                <div class="item-content">
                    <ul class="settings-list">
                        <li><a href="#"><i class="flaticon-user"></i>Profile</a></li>
                        <li><a href="#"><i class="flaticon-gear-loading"></i>Parametre</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn-block" type="submit"><i class="flaticon-turn-off"></i>Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="navbar-item dropdown header-message">
            <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-expanded="false">
                <i class="far fa-envelope"></i>
                <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                <span>1</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="item-header">
                    <h6 class="item-title">Message</h6>
                </div>
                <div class="item-content">
                    <div class="media">
                        <div class="item-img bg-skyblue author-online">
                            <img src="assets/img/figure/student11.png" alt="img">
                        </div>
                        <div class="media-body space-sm">
                            <div class="item-title">
                                <a href="#">
                                    <span class="item-name">Maria Zaman</span>
                                    <span class="item-time">18:30</span>
                                </a>
                            </div>
                            <p>What is the reason of buy this item.
                                Is it usefull for me.....</p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="navbar-item dropdown header-notification">
            <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-expanded="false">
                <i class="far fa-bell"></i>
                <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                <span>8</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="item-header">
                    <h6 class="item-title">03 Notifiacations</h6>
                </div>
                <div class="item-content">
                    <div class="media">
                        <div class="item-icon bg-skyblue">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="media-body space-sm">
                            <div class="post-title">Complete Today Task</div>
                            <span>1 Mins ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>