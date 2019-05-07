<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliverClub</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body> -->
    <style>
        body{
            background: #fff;
        }
    </style>
        <div class="auth_modal modal fade text-white" id="modalAuth" tabindex="-1" role="dialog" aria-labelledby="modalAuthTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    
                  <div class="modal-content pb-5">
                    <div class="modal-header border-0">
                        <span class="modal_close px-2 ml-auto" data-dismiss="modal"><i class="fas fa-times"></i></span>
                    </div>
                  
                  
                    <div class="d-flex flex-column align-items-center">
                        
                        <h3>Вхід</h3>
                        <form class="py-4" action="/login" method="POST" >
                            <div class="form-group">
                                 <label for="inputEmail">Електронна адреса</label>
                                 <input type="email" name="email" class="form-control" id="inputEmail"placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="passField">Пароль</label>
                                <input type="password" name="password" class="form-control" id="passField" placeholder="Password">
                            </div>
                         <button type="submit" class="btn primary_btn d-block mx-auto">Вхід</button>
                        </form>
                        <a href="/login/registration/" class="btn secondary_btn px-4">Зареєструватись</a>
                    </div>
                  </div>
                </div>
              </div>
    <header class="mainpage_header">
        <nav>
            <nav class="navbar navbar-expand-lg navbar-dark pb-5 text-white ">
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarTogglerDemo01" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">
             
                  ToDeliv
                </a>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ml-auto ">
                      <li class="nav-item m-4">
                        <a class="nav-link" id="service_link">Послуги</a>
                      </li>
                      <li class="nav-item m-4">
                        <a class="nav-link" href="#" id="contact_link">Зв'яжіться з нами</a>
                      </li>
                      <li class="nav-item m-4">
                        <a class="nav-link" href="#" id="work_link">Для кур'єрів</a>
                      </li>
                      <li class="nav-item m-4 ">
                        <button type="button" class="primary_btn" data-toggle="modal" data-target="#modalAuth">Вхід / Реєстрація</button>
                      </li>
                    </ul>
                  </div>
              </nav>
        </nav>
        <div class="row text-white container-fluid mt-5 header_content pb-5">
            <div class=" col col-lg-6 col-md-12 px-5">
                <h1 class="header_title">Вигода для кожного</h1>
                <p class="">Знайдіть кур'єра для будь-яких послуг або станьте таким кур'єром</p>
                <a href="#" class="btn primary_btn px-4"  data-toggle="modal" data-target="#modalAuth">Почати</a>
            </div>
            <div class=" col col-4 col-md-0 d-none d-lg-block d-xl-block ">
                <img src="./public/images/rocket2.png" alt="">
            </div>
        </div>
    </header>
    <section class="container py-5" id="service_section">
        <div class="section_head text-center py-5">
                <h3 class="section_subtitle ">найліпші послуги</h3>
                <h2 class="section_title">Що ми пропонуємо</h2>
        </div>
        <div class="section_content row pb-5">
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                <i class="fas fa-briefcase"></i>
                <h4 class="  my-4">Свобода</h4>
                <p class="">Станьте фрілансером у області кур'єрської доставки</p>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="fas fa-search"></i>
                    <h4 class="  my-4">Кур'єри на будь-який смак</h4>
                    <p class="">Знайдіть потрібного вам виконавця по вашим вимогам</p>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="far fa-money-bill-alt"></i>
                    <h4 class="  my-4">Збережіть свої гроші</h4>
                    <p class="">Послуги нашого сервісу є повністю безкоштовними</p>
            </div>
            <!-- <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="fas fa-truck"></i>
                    <h4 class="  my-4">Lorem, ipsum dolor.</h4>
                    <p class="">Lorem ipsum dolor sit amet consectetur, adoptio incidunt fuga atque unde eum dolore.</p>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="fas fa-truck"></i>
                    <h4 class="  my-4">Lorem, ipsum dolor.</h4>
                    <p class="">Lorem ipsum dolor sit amet consectetur, adoptio incidunt fuga atque unde eum dolore.</p>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="fas fa-truck"></i>
                    <h4 class="  my-4">Lorem, ipsum dolor.</h4>
                    <p class="">Lorem ipsum dolor sit amet consectetur, adoptio incidunt fuga atque unde eum dolore.</p>
            </div> -->

        </div>
    </section>
    <section class="container-fluid contact py-5" id="contact_section">
        <form class="col-12 col-lg-6 col-md-8 mx-auto">
        <div class="section_head text-center py-5 ">
                <h3 class="section_subtitle">Пропонуєте або критикуйте</h3>
                <h2 class="section_title text-white">Надішліть нам повідомлення</h2>
            </div>
            <div class="form-group text-white">
                <label for="exampleInputEmail1">EЕлектронна адресса</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Ми не поширюємо вашу електронну адресу нікому</small>
                </div>
            <div class="form-group text-white">
                <label for="mailText">Повідомлення:</label>
                <textarea class="form-control" id="mailText" rows="3"></textarea>
            </div>
            <button type="submit" class="btn primary_btn">Надіслати</button>
        </form>
    </section>
    <section class="container work py-5">
        <div class="section_head text-center py-5">
                <h3 class="section_subtitle ">Всього декілька кроків</h3>
                <h2 class="section_title">Робота для кур'єра</h2>
        </div>
        <div class="row">
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="far fa-file-alt"></i>
                <h3>Залиште вакансію</h3>
            </div>
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="far fa-handshake"></i>
                <h3>Домовтесь із замовником</h3>
            </div>
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="fas fa-truck"></i>
                <h3>Доставляйте!</h3>
            </div>
        </div>
    </section>
    <section class="container-fluid banner text-white py-4" id="work_section">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-8 mx-auto">
                <h4>Всі наші послуги безкоштовні</h4>
                <p>Розпочніть уже зараз і знайдіть те що вам потрібно!</p>
            </div>
            <div class="col-3 my-auto">
                <a href="/login/registration/" class="btn primary_btn ">Розпочати</a>
            </div>
            
        </div>
    </section>

    <script>
        $("#service_link").click(function() {
            var offset = 20; //Offset of 20px

            $('html, body').animate({
                scrollTop: $("#service_section").offset().top + offset
            }, 1200);
        });
        $("#contact_link").click(function() {
            var offset = 20; //Offset of 20px

            $('html, body').animate({
                scrollTop: $("#contact_section").offset().top + offset
            }, 1200);
        });
        $("#work_link").click(function() {
            var offset = 20; //Offset of 20px

            $('html, body').animate({
                scrollTop: $("#work_section").offset().top + offset
            }, 1200);
        });
    </script>
    <?php include "footer.php"?>
   
<!-- </body>
</html> -->