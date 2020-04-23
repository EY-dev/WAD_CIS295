<html>
    <head></head>
    <body>
        <form id="test_login" onsubmit="return false;">
            <div class="input-field login-name">
                <label for="login">Login</label><input id="login" type="text">
            </div>
            <div class="input-field password">
                <label for="pwd">Password</label><input id="pwd" type="password">
            </div>
            <div class="submit-button">
                <button onclick="LogIn()">LogIn</button>
            </div>
        </form>
    </body>
    <script>
        checkPwd = (value) => {
            if (value === ""){
                return false;
            }
            return true;
        };
        checkLogin = (value) =>{
            if (value === ""){
                return false;
            }
            return true;
        };
        function LogIn(){
            let user = document.getElementById("login").value;
            let pwd = document.getElementById("pwd").value;
            if (checkPwd(pwd) && checkLogin(user)){
                sendForm(user, pwd);
            }
            else{
                //do some styling for error
                alert("login or password must be different")
            }
        }
        sendForm = (login, pwd) => {
            let form = {
                login,
                pwd,
            };
            fetch('https://server-url/api/login', {//url
                method: 'post',
                body: JSON.stringify(form)
            }).then((response) => {
                console.log(response);
            }).catch((error) => {
                console.log(error);
            });
        }
    </script>
</html>
