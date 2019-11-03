<div class="container">
    <h1>Добро пожаловать!</h1>

    <form action="<?= $data['action'] ?>" class="form_login">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="login" placeholder="Login" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <div class="error_login"></div>

    </form>


</div>

