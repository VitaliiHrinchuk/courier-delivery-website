<?php include "navigation.php"?>
<div class="modal fade " id="modal_message" tabindex="-1" role="dialog" aria-labelledby="modalAuthTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                 <div class="modal-header border-0">
                    <span class="modal_close px-2 ml-auto" data-dismiss="modal"><i class="fas fa-times"></i></span>
                </div>
                <div class="modal_message px-4 pb-4 d-flex flex-column align-items-start">
                    <h3 id="modal_sender" class="">Повідомлення</h3>
                    <div id="modal_text" class="vacancy_description"></div>
                </div>
              </div>
            </div>
</div>
<section class="profile container pb-4">
    <div class="row content">
        <div class=" col-lg-4 col-md-8 col-sm-12 mx-auto mb-3 row data rounded align-self-start">
        <!-- <?php if($data["is_current"])echo "hello";?> -->

                    <?php
                        if($data['is_current'] && sizeof($data["messages"]) > 0){
                            echo '<div class="offers col-12 mx-auto mb-3 p-2 rounded align-self-start">
                                     <h4>Повідомлення</h4>';
                            foreach ($data["messages"] as $key => $value) {
                                
                                echo '  
                                        <div class="offer pb-2 mt-2 border-bottom">
                                            <h5 class="offer_sender">'.$value["user"].'</h5>
                                            <span class="font-italic">'.$value['offer'].'</span>
                                            <div  class="text py-1 offer_text">'.$value['text'].'</div>
                                            <button data-msgid="'.$value["id"].'" href="#" class="btn secondary_btn" data-toggle="modal" data-target="#modal_message">Показати</button>
                                        </div>';
                                    }
                            echo '</div>';
                        }

                    ?>
            
            <table class="table">
                <tbody>
                    <tr>
                        <td class="data_head border-top-0">Імя</td>
                        <td class="border-top-0"><?php echo $data["name"];?></td>
                    </tr>
                    <tr>
                        <td class="data_head">Дата народження</td>
                        <td><?php echo $data["age"];?></td>
                    </tr>
                    <tr>
                        <td class="data_head">Місто</td>
                        <td><?php echo $data["city"];?></td>
                    </tr>
                    <tr>
                        <td class="data_head">Пошта</td>
                        <td><?php echo $data["email"];?></td>
                    </tr>
                    <tr>
                        <td class="data_head">Транспорт</td>
                        <td><?php
                        if($data["hasTransport"] == null){
                            echo "Невідомо";
                        } else {
                            if($data["hasTransport"] == 1){
                                echo "Так";
                            } else {
                                echo "Ні";
                            }
                        }
                        ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="vacancies col-12 mx-auto mb-3 p-2 rounded align-self-start">
                <h5>Вакансії</h5>
                <?php
                    foreach ($data["offers"] as $key => $value) {
                        $status = $value["status"] == 1 ? "Активна" : "Неактивна";
                        echo "  <div class='vacancy p-2'>
                                    <div>".$value["name"]."</div>
                                    <div>".$status ."</div>
                                    <a href='/vacancy?id=".$value["id"]."' class='btn primary_btn'>Показати</a>
                                </div>";
                    }
                ?>
            </div>
        </div>
        
        <div class="col-lg-7 col-md-8 col-sm-12 mx-auto resume rounded p-3">
            <h4 class="p-0 m-0">Резюме </h4>
            <?php if($data["is_current"])echo "<span ><a href='/user/edit/' class='btn primary_btn'><i class='far fa-edit'></i>Змінити</a></span>";?>
            <p class="mt-3"><?php echo $data["about"] != ''? $data["about"]  :"<span class='font-italic'>Користувач поки не створив опис</span>";?></p>
        </div>
    </div>
</section>
<script>
    let buttons = document.querySelectorAll('.offers .offer button');
    buttons.forEach(element=>{
        element.addEventListener('click', ()=>{
            let parentEl = element.parentElement;
            let sender = parentEl.getElementsByClassName('offer_sender');
            let text = parentEl.getElementsByClassName('offer_text');

            document.getElementById('modal_sender').innerHTML = sender[0].textContent;
            document.getElementById('modal_text').innerHTML = text[0].textContent;
        });
    });
    
</script>
<?php include "footer.php"?>