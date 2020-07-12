<nav id="myNavbar" class="navbar navbar-dark navbar-expand-lg">
  <a class="navbar-brand" href="#">پرتال دانشجویی</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/index">صفحه‌اصلی <span class="sr-only">(الان)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          دانشجویان
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/students">مشاهده‌ دانشجویان</a>
          <!-- <a class="dropdown-item" href="/students/edit.blade.php">ویرایش دانشجو</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          دروس ارایه شده ترم
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/courses?year=1399">مشاهده‌ دروس</a>
          <a class="dropdown-item" href="/takes">انتخاب واحد</a>
        </div>
      </li>
    </ul>
  </div>
</nav>