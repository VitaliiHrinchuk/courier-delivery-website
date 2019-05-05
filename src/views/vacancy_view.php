<?php include "navigation.php"?>
<style>
    body{
        background: #fff;
    }
</style>
<div class="modal fade " id="modal_vacancy" tabindex="-1" role="dialog" aria-labelledby="modalAuthTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
              <div class="modal-header border-0">
                    <span class="modal_close px-2 ml-auto" data-dismiss="modal"><i class="fas fa-times"></i></span>
                </div>
                <div class=" px-4 pb-4 d-flex flex-column align-items-center">
                    <h3>Співпрацюйте</h3>
                    <form class="py-4" action="/vacancy/offering/" method="POST" >
                        <div class="form-group">
                            <label for="message ">Напишіть виконавцю</label>
                            <textarea  name="message" class="form-control" id="message"  rows="4"></textarea>
                            <small id="message" class="form-text text-muted">Напишіть виконавцю, що ви бажаєте скористатись його послугами. Додайте свої контактні дані, щоб ви могли надалі спілкуватись.</small>
                        </div>
                        <input type="hidden" id="offer_id" name="offer_id" value="<?php echo $data["id"];?>">
                        <input type="hidden" id="author_id" name="author_id" value="<?php echo $data["author"]['id'];?>">
                        <button type="submit" class="btn primary_btn d-block mx-auto">Надіслати</button>
                    </form>
                </div>
              </div>
            </div>
</div>
<section class="vacancy_detail container-fluid px-5 pb-4">
    <div class="content row">
        <div class="col col-12 ">
            <h2><?php echo $data["name"]; ?></h2>
            <div>
                <?php
                    foreach ($data['tags'] as $key => $value) {
                        echo '<span class="tag mr-2">'.$value['name'].'</span>';
                    }
                ?>

            </div>
            <hr>
            <div class="author row  mr-auto">
                <div class="author_info col-6 mr-auto d-flex flex-column align-items-start ">
                    <h4><?php echo $data["author"]['name']; ?></h4>
                    <span><?php echo $data["author"]['age']; ?></span>
                    <span>Місто: <?php echo $data["author"]['city']; ?></span>
                    <span>Транспорт: <?php echo $data["author"]['hasTransport'] == 1 ? "Так" : "Ні" ; ?></span>
                </div>
                <div class="col-6 ml-auto text-right d-flex flex-column justify-content-center ">
                    Середня ціна: <span class="font-weight-bold"><?php echo $data['avg_price']; ?> грн</span>   
                </div>
            </div>
            <hr>
            <div class="d-flex flex-column ">
                <div class="py-4 vacancy_description"><?php echo $data["text"]; ?></div>
                <div><span class="font-weight-bold">Опубліковано:</span> <?php 
                $date = new DateTime($data['publish_date']);
                echo $date->format('d.m.Y');
                ?></div>
            </div>
            <?php
                if($data["author"]["id"] !== $_SESSION["user_id"]){
                    echo '<button class="btn primary_btn my-3 p-1 px-2 rounded" data-toggle="modal" data-target="#modal_vacancy">Відповісти на вакансію</button>';
                }
            ?>
            
        </div>
        <hr>
        <div class="col col-9 col-lg-9 col-sm-12 col-md-12 comments mt-4 p-3">
            <h4>Коментарі <?php echo sizeof($data["comments"]); ?> <a href='#' class='btn primary_btn' ></i></a></h4>
            <form class="py-4 comment_field" action="/vacancy/comment/" method="POST" >
                    <div class="form-group">
                        <label for="comment ">Залиште коментар</label>
                        <textarea  name="comment" class="form-control" id="comment"  rows="4"></textarea>
                     </div>
                     <input type="hidden" id="offer_id" name="offer_id" value="<?php echo $data["id"];?>">
                 <button type="submit" class="btn primary_btn d-block mx-auto">Залишити коментар <i class="far fa-comment-alt"></i></button>
            </form>
            <div class="mt-3">
                <?php 
                    foreach ($data['comments'] as $key => $value) {
                        echo '<div class="d-flex flex-column align-items-start p-2 border-top border-bottom">
                                <h5 class="name"><a class="btn primary_btn" href="/user?id='.$value['id'].'">'.$value['name'].'</a></h5>
                                <div class="text">'.$value['text'].'</div>
                              </div>';
                    }
                ?>
            </div>

        </div>
    </div>
</section>
<?php include "footer.php"?>