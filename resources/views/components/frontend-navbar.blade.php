<nav class="navbar navbar-expand-lg navbar-light bg-secondary text-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Click Dharan</a>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @php
                    $first_category = $categories->take(5);
                    $last_category = $categories->skip(5);
                @endphp
                @foreach ($first_category as $category)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ $category->nepali_title }}</a>
                    </li>
                @endforeach
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        अन्य
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (count($last_category) > 0)
                            @foreach ($last_category as $category)
                                <li><a class="dropdown-item" href="#">{{ $category->nepali_title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
