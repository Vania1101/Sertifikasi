<nav style="background-color: white; border-bottom: 1px solid #e5e7eb;">

    <div style="
        max-width: 1280px;
        margin: auto;
        padding: 0 24px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    ">

        <!-- DASHBOARD -->
        <a href="{{ route('dashboard') }}"
           style="
                font-size: 18px;
                font-weight: 600;
                color: #111827;
                text-decoration: none;
           ">
            Dashboard
        </a>


        <!-- USER -->
        <div style="
            display: flex;
            align-items: center;
            gap: 15px;
        ">

            <span style="
                font-size: 14px;
                color: #4b5563;
            ">
                {{ Auth::user()->name }}
            </span>


            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        style="
                            border: none;
                            background: transparent;
                            color: #dc2626;
                            cursor: pointer;
                            font-size: 14px;
                        ">
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>