<section class="container-fluid signup text-white">


    <h1 class="py-4"> Вхід 
    </h1>
    <form class="singup_form col-9 col-md-6 col-lg-4 mx-auto d-flex flex-column align-items-center justify-content-center" action="" method="post">
        <div class="form-group col-10">
            <label for="email">Електронна адреса</label>
            <input type="email" name="email" class="form-control" id="email"  placeholder="e.g. mail@gmail.com">           
        </div>
        
        <div class="form-group col-10">
            <label for="password">Пароль</label>
            <input type="password" name="password" class="form-control" id="password"  placeholder="Password">
        </div>
		<?php 
                if(isset($data["login_status"]) && !$data["login_status"]){
                    echo ' <small id="emailError" class="text-warning ">
                    Невірна електронна адреса або пароль!
                    </small>';
                }
            ?>
        <button type="submit" class="btn primary_btn d-block mx-auto mt-3 col-4">Вхід</button>

    </form>
    
</section>