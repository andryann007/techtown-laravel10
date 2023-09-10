<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity: 0.85;">
    <div class="container">
        <!-- Navbar Title Bootstrap 5 -->
        <a class="navbar-brand" href="#">Tech Town</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Menu Bootstrap 5 -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <div class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Home') ? 'active' : ''; }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'About') ? 'active' : ''; }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Services') ? 'active' : ''; }}" href="/services">Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Products') ? 'active' : ''; }}" href="/products">Our Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Contact') ? 'active' : ''; }}" href="/contact">Contact Us</a>
                </li>
            </div>
        </div>
    </div>
</nav>