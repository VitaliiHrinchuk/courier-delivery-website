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
                  <div class="modal-content py-5">
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
             
                  DeliverCLub
                </a>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ml-auto ">
                      <li class="nav-item active m-4">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item m-4">
                        <a class="nav-link" href="#">Features</a>
                      </li>
                      <li class="nav-item m-4">
                        <a class="nav-link" href="#">Pricing</a>
                      </li>
                      <li class="nav-item m-4">
                        <a class="nav-link" href="#">Disabled</a>
                      </li>
                      <li class="nav-item m-4 ">
                        <button type="button" class="primary_btn" data-toggle="modal" data-target="#modalAuth">Login / Register</button>
                      </li>
                    </ul>
                  </div>
              </nav>
        </nav>
        <div class="row text-white container-fluid mt-5 header_content pb-5">
            <div class=" col col-lg-6 col-md-12 px-5">
                <h1 class="header_title">Unbeateble offers</h1>
                <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse dolore earum, placeat perferendis accusamus unde saepe? Distinctio dolores dolor impedit.</p>
                <a href="#" class="btn primary_btn px-4"  data-toggle="modal" data-target="#modalAuth">Start</a>
            </div>
            <div class=" col col-4 col-md-0 d-none d-lg-block d-xl-block ">
                <img src="./public/images/rocket.png" alt="">
            </div>
        </div>
    </header>
    <section class="container py-5">
        <div class="section_head text-center py-5">
                <h3 class="section_subtitle ">The best out there</h3>
                <h2 class="section_title">What we offer</h2>
        </div>
        <div class="section_content row pb-5">
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
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
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center content_item">
                    <i class="fas fa-truck"></i>
                    <h4 class="  my-4">Lorem, ipsum dolor.</h4>
                    <p class="">Lorem ipsum dolor sit amet consectetur, adoptio incidunt fuga atque unde eum dolore.</p>
            </div>

        </div>
    </section>
    <section class="container-fluid contact py-5">
        <form class="col-12 col-lg-6 col-md-8 mx-auto">
        <div class="section_head text-center py-5 ">
                <h3 class="section_subtitle">The best out there</h3>
                <h2 class="section_title text-white">Send smth to us</h2>
            </div>
            <div class="form-group text-white">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
            <div class="form-group text-white">
                <label for="mailText">Message:</label>
                <textarea class="form-control" id="mailText" rows="3"></textarea>
            </div>
            <button type="submit" class="btn primary_btn">Send</button>
        </form>
    </section>
    <section class="container work py-5">
        <div class="section_head text-center py-5">
                <h3 class="section_subtitle ">Find in few stepse</h3>
                <h2 class="section_title">Work for courier</h2>
        </div>
        <div class="row">
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="far fa-file-alt"></i>
                <h3>Post tour resume</h3>
            </div>
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="far fa-handshake"></i>
                <h3>Deal with customer</h3>
            </div>
            <div class="work_step col-12 col-lg-4 col-md-4 d-flex flex-column align-items-center my-4">
                <i class="fas fa-truck"></i>
                <h3>Deliver!</h3>
            </div>
        </div>
    </section>
    <section class="container-fluid banner text-white py-4">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-8 mx-auto">
                <h4>JDedicated hosting solutions only $129.99/month</h4>
                <p>Proin gravida nibh vel velit auctor aliquet, aenean sollicitudin lorem quis bibendum auctor, nisi elit consequat ipsum</p>
            </div>
            <div class="col-3 my-auto">
                <a href="/login/registration/" class="btn primary_btn ">Get Started</a>
            </div>
            
        </div>
    </section>
    <?php include "footer.php"?>
   
<!-- </body>
</html> -->