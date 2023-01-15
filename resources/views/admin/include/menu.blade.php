<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img class="brand-image img-circle elevation-3" style="opacity: .8" style="width: 80%"
            src="{{ URL::to('/') }}/logos/1.png">
        <span class="brand-text font-weight-light">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-2">

            @if (Auth::user()->type == 'Admin')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{ route('dashboard') }}" class="nav-link active" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user-list') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Users </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('campaigns') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Campaign </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subscribeCamp') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fa fa-cart-arrow-down"></i>
                            <p> Subscribe </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('messagelist') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p> Message </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('allMessages') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p> User Message </p>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{ route('dashboard') }}" class="nav-link active" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('subscribeCamp') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fa fa-cart-arrow-down"></i>
                            <p> Subscribes </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('userSubscription') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fa fa-cart-arrow-down"></i>
                            <p>My Subscription </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('mymessages') }}" class="nav-link" style="color: rgb(255, 255, 255)">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p> Messages </p>
                        </a>
                    </li>


                </ul>
            @endif

        </nav>


        <!-- Sidebar Menu -->

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
