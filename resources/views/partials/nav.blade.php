<nav class="navbar bg-danger navbar-expand d-flex flex-column align-item-start offcanvas offcanvas-start" tabindex="-1"
    id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" id="sidebar">
    <div class="offcanvas-header ms-auto text-white">
        <button type="button" class=" btn btn-outline-danger text-white fs-5 " data-bs-dismiss="offcanvas"
            aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
    <a href="#" class="navbar-brand text-light mt-1">
        <div class="display-5 font-weight-bold text-center"><img src="/img/logopmi_w.png" class="w-50" alt="">
        </div>
    </a>
    <ul class="navbar-nav d-flex flex-column mt-5 w-100">
        <li class="nav-item w-100">
            <a href="/"
                class="nav-link text-light ps-4 {{ Request::is('/') ? 'bg-white bg-opacity-25 disabled' : '' }}">Home</a>
        </li>
        <li class="nav-item w-100">
            <a href="/surat"
                class="nav-link text-light ps-4 {{ Request::is('surat*') ? 'bg-white bg-opacity-25 disabled' : '' }}">Surat</a>
        </li>
        <li class="nav-item dropdown w-100">
            <a href="#"
                class="nav-link dropdown-toggle text-light ps-4 {{ Request::is('pengajuan*') ? 'bg-white bg-opacity-25' : '' }}"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Pengajuan</a>
            <ul class="dropdown-menu w-100">
                <li><a href="/pengajuan" class="dropdown-item text-light ps-5 p-2">All</a></li>
                <li><a href="/pengajuan/terima" class="dropdown-item text-light ps-5 p-2">Terima</a></li>
                <li><a href="/pengajuan/arsip" class="dropdown-item text-light ps-5 p-2">Tolak</a></li>
            </ul>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item w-100">
                <a href="/user"
                    class="nav-link text-light ps-4 {{ Request::is('user*') ? 'bg-white bg-opacity-25 disabled' : '' }}">User</a>
            </li>
        @endif
        <li class="nav-item w-100">
            <a href="/profile"
                class="nav-link text-light ps-4 {{ Request::is('profile*') ? 'bg-white bg-opacity-25 disabled' : '' }}">Profile</a>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item w-100">
                <a href="/logactivity" class="nav-link text-light ps-4">Log Activity</a>
            </li>
        @endif
        <li class="nav-item w-100 px-4">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" role="button"
                    class=" btn btn-outline-danger w-100 text-light ps-4 fs-5">Logout</button>
            </form>
        </li>
    </ul>
</nav>
