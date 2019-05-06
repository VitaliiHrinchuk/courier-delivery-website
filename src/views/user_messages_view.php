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
<section class="messages container p-3 mb-3">
                    <?php
                        if(sizeof($data["messages"]) > 0){
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