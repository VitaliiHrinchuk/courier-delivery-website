<?php include "navigation.php"?>

<section class="vacancy_add container pb-4">
    <div class="content rounded p-4">
        <form class="col-12 col-md-12 col-lg-12 mx-auto " action="" method="post">
            <div class="form-group ">
                <label for="vacancy_name ">Назва вакансії</label>
                <input type="text" name="vacancy_name" class="form-control" id="vacancy_name"  placeholder="">
                <small id="name_help" class="form-text text-muted">Прийдумайти назву своїй вакансії. Зрозбіть її максимально простою і зрозумілою, щоб людям не довелось здогадуватись, про що вона.</small>
            </div>
            <div class="form-group">
                <label for="vacancy_desc ">Опис вакансії</label>
                <textarea  name="vacancy_desc" class="form-control" id="vacancy_desc"  rows="8"></textarea>
                <small id="desc_help" class="form-text text-muted">Детально опишіть свою вакансію і можливі нюанси. Спробуйте описати всі можливі деталі, щоб вам не довелось вести довгий діалог із замовником, щодо неточностей</small>
            </div>
            <div class="form-group ">
                <div>Оберіть теги для своєї вакансії</div>
                <small id="tag_help" class="form-text text-muted pb-3">Оберіть теги які відповідають вашій вакансії. Не виберайте занадто багато категорій, щоб ваша вакансія виглядала більш конкретною і зрозумілою</small>
            <?php
                if(isset($data["tags"])){
                    foreach ($data['tags'] as $key => $value) {
                        echo '<div class="form-check form-check-inline pl-2">
                                    <input class="form-check-input" type="checkbox" value="'.$value['id'].'" id="tag-'.$value['id'].'" name="tags[]">
                                    <label class="form-check-label" for="tag-'.$value['id'].'">
                                        '.$value["name"].'
                                    </label>
                                </div>';
                    }
                }
            ?>
            </div>
            <div class="form-group ">
                <label for="vacancy_name ">Ціна</label>
                <input type="number" name="avg_price" class="form-control" id="avg_price"  placeholder="">
                <small id="price_help" class="form-text text-muted">Середня ціна, яку ви пропонуєте за вашу послугу</small>
            </div>
            <button type="submit" class="btn primary_btn d-block mx-auto mt-5 col-2">Додати</button>

        </form>
    </div>
</section>