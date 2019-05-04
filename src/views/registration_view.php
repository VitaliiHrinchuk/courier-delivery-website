
<section class="container-fluid signup text-white">


    <h1 class="py-4"> Реєстрація 
    </h1>
    <form class="singup_form col-9 col-md-6 col-lg-4 mx-auto d-flex flex-column align-items-center justify-content-center" action="" method="post">
        <div class="form-group col-10">
            <label for="email">Ваша електронна пошта</label>
            <input type="email" name="email" class="form-control" id="email"  placeholder="e.g. mail@gmail.com">
            <?php 
                if(isset($data["registered"]) && !$data["registered"] && $data["err_type"] == "mail_exist"){
                    echo ' <small id="emailError" class="text-warning ">
                    Така електронна адреса вже існує!
                    </small>';
                }
            ?>
           
        </div>
        
        <div class="form-group col-10">
            <label for="password">Створіть пароль</label>
            <input type="password" name="password" class="form-control" id="password"  placeholder="Password">
        </div>
        <div class="form-group col-10">
            <label for="name">Ваше І'мя</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="e.g. Сергій">
        </div>
        <div class="form-group col-10">
            <label for="age" >Дата народження</label>
            <input type="text" name="age" class="form-control datepicker-here" id="age" data-date-format="yyyy-mm-dd"  placeholder="e.g. 1999.12.09" autocomplete="off">
        </div>
        <div class="form-group col-10">
        <label for="citySelect">Місто</label>
            <select id="citySelect" class="form-control form-control-sm" name="city">
            </select>
        </div>

        <button type="submit" class="btn primary_btn d-block mx-auto mt-3 col-4">Далі</button>

    </form>
    
</section>
<script src='/public/js/cities_data.json'></script>
<script src="/public/js/datepicker.min.js"></script>

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

$('#age').datepicker({
    maxDate: new Date()
})
</script>