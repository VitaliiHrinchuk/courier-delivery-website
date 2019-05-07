<header class="standart_header mb-4">
        <nav>
            <nav class="navbar navbar-expand-lg navbar-dark  text-white ">
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarTogglerDemo01" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">
                  ToDeliv
                  
                </a>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ml-auto ">
                      <li class="nav-item  m-1">
                        <a class="nav-link" href="/user">Профіль </a>
                      </li>
                      <li class="nav-item  m-1">
                        <a class="nav-link" href="/user/messages">Повідомлення <?php echo $_SESSION["unread_msg"] > 0 ? '<span class="msg_unread">'.$_SESSION["unread_msg"].'</span>' : '' ;?></a>
                      </li>
                      <li class="nav-item m-1">
                        <a class="nav-link" href="/offers/">Кур'єрські пропозиції</a>
                      </li>
                      <li class="nav-item m-1">
                        <a class="nav-link" href="/vacancy/add/">Дадати вакансію</a>
                      </li>
                      <li class="nav-item m-1 ">
                       <a class="nav-link" href="/user/logout/">Вийти</a>
                      </li>
                    </ul>
                  </div>
              </nav>
        </nav>
</header>

