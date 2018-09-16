<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Bienvenido a IN+</h3>
        <p>Iniciar sesión</p>
        <form class="m-t" role="form" name="loginForm" id="login-form" ng-submit="login(user)" autocomplete="off">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Correo" ng-model="user.email" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" ng-model="user.password" />
                <div class="m-t-xs" ng-show="!user.isvalid">
                    <small class="text-danger">{{message}}</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Aceptar</button>
            <a ui-sref="forgot_password"><small>¿Olvidaste la contraseña?</small></a>
        </form>
        <p class="m-t"> <small>Desarrollado por <a href="https://www.linkedin.com/in/bapc-cesar" target="_blank">César Bautista Pérez</a> &copy; 2018</small> </p>
    </div>
</div>