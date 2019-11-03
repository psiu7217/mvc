<div class="container">
    <h1>Список задач</h1>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Сортировка</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
            <option value="<?= $sord_def ?>" <? if ($sord_def_active) echo 'selected'?>>Нет</option>
            <option value="<?= $user_name_asc ?>" <? if ($user_name_asc_active) echo 'selected'?>>Имя пользователя(ASC)</option>
            <option value="<?= $user_name_desc ?>" <? if ($user_name_desc_active) echo 'selected'?>>Имя пользователя(DESC)</option>
            <option value="<?= $user_email_asc ?>" <? if ($user_email_asc_active) echo 'selected'?>>Email (ASC)</option>
            <option value="<?= $user_email_desc ?>" <? if ($user_email_desc_active) echo 'selected'?>>Email (DESC)</option>
            <option value="<?= $status_asc ?>" <? if ($status_asc_active) echo 'selected'?>>Статус (ASC)</option>
            <option value="<?= $status_desc ?>" <? if ($status_desc_active) echo 'selected'?>>Статус (DESC)</option>
        </select>
    </div>

    <? if(isset($tasks) && $tasks) { ?>
        <div class="row tasks">
            <? foreach ($tasks as $task) { ?>
                <div class="col-sm-4">
                    <div class="item">
                        <div class="title"><span>Заголовок</span><?= htmlspecialchars($task[1]); ?></div>
                        <div class="description"><span>Описание</span><?= htmlspecialchars($task[2]); ?></div>
                        <div class="user_name"><span>Email</span><?= htmlspecialchars($task[5]); ?></div>
                        <div class="user_email"><span>Имя пользователя</span><?= htmlspecialchars($task[6]); ?></div>
                        <div class="status">
                            <span>Статус</span>
                            <? if ($task[3]) {
                                echo 'Выполнено';
                            }else {
                                echo 'В процессе';
                            } ?>
                        </div>
                        <div class="edit">
                            <span>Редактировалось</span>
                            <? if ($task[4]) {
                                echo 'Да';
                            }else {
                                echo 'Нет';
                            } ?>
                        </div>

                        <? if (isset($_COOKIE['login_user']) && $_COOKIE['login_user'] =='admin') { ?>
                            <div class="btn_group_task">
                                <a class="btn btn-primary edit_task" href="/tasks/edit?id=<?= $task[0] ?>">Редактировать</a>
                            </div>
                        <? } ?>
                    </div>
                </div>

            <? } ?>

        </div>

        <? if ($count_tasks && $count_tasks != 1) { ?>
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <? for ($i = 1; $i <= $count_tasks; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i ?><?=$url_pagination?>"><?= $i ?></a></li>
                            <? } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        <? } ?>


    <? } ?>


</div>

