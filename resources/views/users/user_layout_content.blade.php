<div class="row clearfix mt-5">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills">
            <a class="nav-link {{$tab_menu=="user_info"?"active":""}}" href="{{route('users.show', $user->id)}}">User Info</a>
            <a class="nav-link {{$tab_menu=="sales"?"active":""}}" href="{{route('user.sales', $user->id)}}">sales</a>
            <a class="nav-link {{$tab_menu=="purchases"?"active":""}}" href="{{route('user.purchases', $user->id)}}">Purchase</a>
            <a class="nav-link {{$tab_menu=="payments"?"active":""}}" href="{{route('user.payments', $user->id)}}">Payments</a>
            <a class="nav-link {{$tab_menu=="receipts"?"active":""}}" href="{{route('user.receipts', $user->id)}}">Receipts</a>
        </div>
    </div>
    <div class="col-md-10">
        @yield('user_content')
    </div>
</div>



