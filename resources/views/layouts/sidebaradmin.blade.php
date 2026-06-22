<style>
    .sidebar{
        width:230px;
        height:100vh;
        background:linear-gradient(180deg, #908CFF);
        padding:20px;
        color:white;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }

    .sidebar h2{
        text-align:center;
        font-size:32px;
        margin-bottom:30px;
    }

    .menu{
        margin-top:30px;
    }

    .menu a{
        display:block;
        padding:12px;
        margin-bottom:10px;
        color:white;
        text-decoration:none;
        border-radius:8px;
        transition:0.2s;
        font-weight:500;
    }

    .menu a:hover{
        background:rgba(255,255,255,0.25);
        transform:translateX(5px);
    }

    .logout{
        background:#FF3B3B;
        padding:12px;
        text-align:center;
        border-radius:8px;
        cursor:pointer;
        font-weight:600;
        color:white;
        text-decoration:none;
        transition:0.2s;
    }

    .logout:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(0,0,0,0.15);
    }
</style>
<div class="sidebar">
    <div>
        <h2>SIPEMA</h2>
        <div class="menu">
            <a href="/dashboardadmin">Dashboard</a>
            <a href="/datapengaduan">Data Pengaduan</a>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">Sign Out</button>
    </form>
</div>