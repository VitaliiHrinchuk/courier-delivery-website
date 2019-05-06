<?php include "navigation.php";?>
<style>
    body{
        background: #fff;
    }
</style>
<!-- <?php  print_r($data["offer_count"]); ?> -->
<section class="offers_list container">
    <form class="filter" action="/offers" method="GET">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="search">Пошук</label>
                <input type="text" class="form-control form-control-sm" id="search" placeholder="Доставка " name="search">
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
                    <?php 
                        foreach ($data["tags"] as $key => $value) {
                            echo '<option value="'.$value.'">'.$value.'</option> ';
                        }
                    ?>
                </select>
            </div>
            
        </div>
        <div class=" form-group form-check">
            <input class="form-check-input " type="checkbox" id="transport" name="transport">
            <label class="form-check-label" for="transport">
                   Транспорт
            </label>
        </div>
        <input type="hidden" name="offset" value='0'>
        <button type="submit" class="btn primary_btn mx-auto mt-3 d-inline">Примінити фільтри</button>
    </form>
    <div class="list  py-3">
        <?php
        foreach ($data["offers"] as $key => $value) {
            echo '<div class="list_item pt-4 col-12 col-md-10 col-lg-8 border-top">
                    <div class="d-flex align-items-center ">
                        <h3 class="font-weight-normal"><a href="/vacancy?id='.$value['offer_id'].'" class="btn link_btn">'.$value['offer_name'].'</a></h3>
                        <span class="ml-auto">'.$value['avg_price'].' грн.</span>
                    </div>
                    <div class="">
                    '.$value['city'].'
                    </div>';

            $tags = explode(",",$value["tags"]);

            echo '<div class="my-2">';
            foreach ($tags as $tag_key => $tag) {
                    echo '<span class="tag mr-2 ">'.$tag.'</span>';

            }
            echo '</div>';

            echo '<div class="offer_description">'.$value["text"].'</div>
                    
                    <div class="d-flex align-items-center mt-2">
                        <span>Автор: <a href="/user?id='.$value["author_id"].'" class="btn link_btn">'.$value["author"].'</a></span>
                        <span class="ml-auto mr-3 info"><i class="far fa-eye"></i> '.$value["views"].'</span>
                        <span class="info"><i class="far fa-comment-dots"></i> '.$value["comments"].'</span>
                    </div>

                </div>';
        }
            

        ?>
    
    </div>
    <nav aria-label="...">
  <ul class="pagination">
      
      <?php 
        $num = 5;
        $total = ceil(intval($data["offer_count"]) / $num);
        
        $prev = intval($data["current_offset"]) > 0 ? intval($data["current_offset"])+5 : 0 ;

        echo '<li class="page-item '.(intval($data["current_offset"]) == 0 ? 'disabled' : '' ).'  ">
                <a class="page-link" href="/offers?offset='.$prev.'" tabindex="-1">Previous</a>
              </li>';

        for ($i=0; $i <= $total; $i++) {    
            $cur_str = (ceil(intval($data["current_offset"]) / $num) + 1) == $i + 1?  "active" :  "" ;
            echo '<li class="page-item '.$cur_str.'"><a class="page-link" href="/offers?offset='.$i*$num.'">'.($i+1).'</a></li>';
        }

        $next = intval($data["current_offset"]) < $total ? intval($data["current_offset"])+5 : 0 ;

        echo '<li class="page-item '.(intval($data["current_offset"]) >= ceil(intval($data["offer_count"])) ? 'disabled' : '' ).'  ">
                <a class="page-link" href="/offers?offset='.$next.'" tabindex="-1">Next</a>
              </li>';
      ?>
    
    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li> -->
<!--     
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li> -->
  </ul>
</nav>
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