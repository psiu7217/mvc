<div class="container">
    <h1>Добавить новую задачу</h1>

    <form action="<?= $data['action'] ?>" class="update_task">
        <input type="hidden" name="id" value="<?= $info[0][0] ?>">
        <input type="hidden" name="old_description" value="<?= $info[0][2] ?>">
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" class="form-control" name="title" placeholder="Заголовок" value="<?= $info[0][1] ?>" required>
        </div>
        <div class="form-group">
            <label>Имя пользователя</label>
            <input type="text" class="form-control" name="user_name" placeholder="Имя пользователя" value="<?= $info[0][6] ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="Email" value="<?= $info[0][5] ?>" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" name="description" placeholder="Описание" value="<?= $info[0][2] ?>"><?= $info[0][2] ?></textarea>
        </div>

        <div class="form-group">
            <label>Статус</label>
            <input type="number" class="form-control" name="status" placeholder="Статус" value="<?= $info[0][3] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>

        <div class="error_task"></div>


    </form>


</div>

