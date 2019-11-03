<div class="container">
    <h1>Добавить новую задачу</h1>

    <form action="<?= $data['action'] ?>" class="add_task">
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" class="form-control" name="title" placeholder="Заголовок" required>
        </div>
        <div class="form-group">
            <label>Имя пользователя</label>
            <input type="text" class="form-control" name="user_name" placeholder="Имя пользователя" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" name="description" placeholder="Описание"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>

        <div class="error_task"></div>

    </form>


</div>

