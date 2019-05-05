<?php include "navigation.php"?>
<section class="profile container pb-4">
    <div class="row content">
        <div class=" col-lg-4 col-md-8 col-sm-12 mx-auto mb-3 row data rounded align-self-start">
            
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
                                    <a href='#' class='btn primary_btn'>Показати</a>
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
<?php include "footer.php"?>