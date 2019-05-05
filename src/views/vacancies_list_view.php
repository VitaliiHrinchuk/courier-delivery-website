<?php include "navigation.php";?>
<section class="offers_list container">
    <form class="filter" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="search">Пошук</label>
                <input type="text" class="form-control form-control-sm" id="search" placeholder="Доставка ">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="citySelect">Місто</label>
                <select id="citySelect" class="form-control form-control-sm" name="city">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="tagSelect">Тип</label>
                <select id="tagSelect" class="form-control form-control-sm" name="tag">
                    <option value=""></option>
                </select>
            </div>
            
        </div>
        <div class=" form-group form-check">
            <input class="form-check-input " type="checkbox" id="transport" name="transport">
            <label class="form-check-label" for="transport">
                   Транспорт
            </label>
        </div>
    </form>
    <div class="list  py-3">
        <div class="list_item pt-4 col-8 border-top">
            <div class="d-flex align-items-center mb-2">
                <h3 class="font-weight-normal"><a href="#" class="btn link_btn">Назва</a></h3>
                <span class="ml-auto">3000 грн.</span>
            </div>
            <div class="my-2">
                <span class="tag mr-2 ">DSADAS</span>
            </div>
            <div class="offer_description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam soluta, doloribus tempora beatae repellat corporis iure accusamus laudantium perferendis magni dolorem amet ex deleniti reiciendis? Modi deleniti dicta excepturi magni dolorum unde dolor consequuntur nobis iste? Eius quas hic nihil iure maxime voluptas quos fugit cumque, ut suscipit ipsam dolore vitae commodi modi nobis, officia incidunt iste sit, consequuntur in? Labore nostrum, autem beatae temporibus provident illo distinctio a eum adipisci molestias assumenda consequatur laudantium? Quod, autem placeat necessitatibus sunt quidem explicabo ipsum rem reiciendis eveniet aut dicta temporibus asperiores, repellendus accusantium in sed, repudiandae similique et. Voluptas ex ducimus officia alias consequuntur, tenetur veniam voluptatum sapiente, recusandae velit consequatur. Architecto ut itaque provident a cum odio impedit neque delectus porro, eius repellat nisi error? Ducimus impedit in iusto doloremque officiis dolore officia libero veritatis ratione velit voluptatem odit aspernatur, tempore aliquam accusamus numquam, laudantium dolor consequuntur. Corrupti, tempore aliquam!</div>
            
            <div class="d-flex align-items-center mt-2">
                <span>Автор: <a href="#" class="btn link_btn">Вася</a></span>
                <span class="ml-auto mr-3 info"><i class="far fa-eye"></i> 123</span>
                <span class="info"><i class="far fa-comment-dots"></i> 123</span>
            </div>

        </div>
    </div>
</section>
<script src='/public/js/cities_data.json'></script>

<script>
// $('#age').datepicker({})


let cityArray = JSON.parse(cities).cities;

let selectEl = document.getElementById('citySelect');

cityArray.forEach(element => {
    let optionEl = document.createElement('option');
    optionEl.innerHTML = element;
    optionEl.value = element;

    selectEl.appendChild(optionEl);
});

</script>
<?php include "footer.php";?>