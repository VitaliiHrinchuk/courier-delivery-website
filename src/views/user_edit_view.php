<?php include "navigation.php"?>
<section class="edit">
<form class="singup_form col-12 col-md-6 col-lg-6 mx-auto py-4" action="" method="post">
        <h2 class="text-center my-3">Редагування профілю</h2>
        <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="data_head border-top-0"><label for="name" class="col-form-label">Ім'я</label></td>
                        <td class="">
                            <div class="form-group  ">
                                <?php
                                    echo '<input type="text" name="name" class="form-control" id="name" value="'.$data["name"].'"  placeholder="e.g. Сергій">'
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="data_head"><label for="age"  class="col-form-label">Дата народження</label></td>
                        <td>
                            <div class="form-group  ">
                                <?php
                                    echo ' <input data-currentAge="'.$data["age"].'" type="text" name="age" class="form-control datepicker-here" id="age" data-date-format="yyyy-mm-dd"  autocomplete="off">'
                                ?>
                               
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="data_head"><label for="citySelect"  class="col-form-label">Місто</label></td>
                        <td>
                            <div class="form-group ">
                                <?php
                                    echo '<select id="citySelect" class="form-control form-control-sm" name="city" data-currentCity="'.$data["city"].'">
                                          </select>';
                                ?>
                                
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="data_head">Транспорт</td>
                        <td>
                            <div class="form-group ">
                                <?php 
                                    $checked = $data['hasTransport'] == 1 ? true : false;
                                    echo '<input type="checkbox" checked="'.$checked.'" name="hasTransport">';
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="data_head"><label for="about">Резюме</label></td>
                        <td>
                            <div class="form-group ">
                                <textarea class="form-control" id="about" name="about" rows="8"><?php echo $data["about"];?></textarea>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn primary_btn d-block mx-auto mt-3 col-4">Зберегти</button>
    </form>


</section>

<script src='/public/js/cities_data.json'></script>
<script src="/public/js/datepicker.min.js"></script>

<script>
let cityArray = JSON.parse(cities).cities;

let selectEl = document.getElementById('citySelect');

cityArray.forEach(element => {
    let optionEl = document.createElement('option');
    optionEl.innerHTML = element;
    optionEl.value = element;

    selectEl.appendChild(optionEl);
});
$.fn.datepicker.language['ua'] =  {
    days: ['Неділя','Понеділок','Вівторок','Середа','Четвер',"П'ятиниця",'Субота'],
    daysShort: ['Нд','Пн','Вт','Ср','Чт','Пт','Сб'],
    daysMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    months: ['Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень'],
    monthsShort: ['Січ','Лют','Бер','Квіт','Трав','Чер','Лип','Сер','Вер','Жов','Лис','Груд'],
    today: 'Сьогодні',
    clear: 'Очистити',
    firstDay: 1
};
$('#age').datepicker({
    maxDate: new Date(),
    language: 'ua'

})
console.log();

let startDate = new Date($("#age").data("currentage"));
let dp = $('#age').datepicker({startDate: startDate}).data('datepicker');

dp.selectDate(startDate)


let currentCity = $("#citySelect").data("currentcity");
$("#citySelect option[value="+currentCity+"]").attr('selected','selected');

</script>