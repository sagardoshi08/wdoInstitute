<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light"><img src="{{ asset('backend/logo.svg') }}" width="200px"></div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.Dashboard') }}"><i class="fa fa-hmd-dashboard"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'user' ? 'active' : '' }}" href="{{ route('admin.User') }}"><i class="fa fa-hmd-users-icon"></i> Users</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'page' ? 'active' : '' }}" href="{{ route('admin.Page') }}"><i class="fa fa-hmd-pages"></i> Pages</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(3) == 'admins' ? 'active' : '' }}" href="{{ route('admin.Admins') }}"><i class="fa fa-hmd-admin"></i> Admins</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'contact-us' ? 'active' : '' }}" href="{{ route('admin.ContactUs') }}"><i class="fa fa-mail" aria-hidden="true"></i> Contact Us</a>
        <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'fundraise' ? 'active' : '' }}" href="{{ route('admin.Fundraise') }}"><i class="fa fa-phone"></i> Fundraise</a> -->
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::segment(2) == 'organization' ? 'active' : '' }}" href="{{ route('admin.Organization') }}"><i class="fa fa-phone"></i> Organization</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('logout') }}"><i class="fa fa-hmd-logout"></i> Logout</a>
    </div>
</div>
