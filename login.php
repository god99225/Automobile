<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Module</title>
    <style>
          @import url('https://fonts.googleapis.com/css?family=Audiowide');
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('./Gallary11/ai-generated-8437470.jpg'); /* Replace 'background-image.jpg' with your image file */
            background-size: cover;
            background-position: center;
        }

        .block1 {
            width: 320px;
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent background */
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 150px;
        }

        #login-form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #login-form button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #login-form button:hover {
            background-color: #0056b3;
        }

        #login-form label {
            margin-bottom: 10px;
            display: block;
            text-align: left;
            color: #555;
        }

        #login-form .actions {
            margin-top: 20px;
            text-align: center;
        }

        #login-form .actions button {
            background-color: transparent;
            color: #007bff;
            border: none;
            cursor: pointer;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        #login-form .actions button:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="block1">
        <img class="logo" src="fire-png-703.png" alt="Logo">
        <h1 style="font-family: 'Audiowide', sans-serif; font-size: 50px; text-align: center; color: #888888;">CARZZ</h1>
        <form id="login-form">
            <input type="text" id="username" placeholder="Username">
            <input type="password" id="password" placeholder="Password">
            <button id="login-button">LOGIN</button>
            <div class="actions">
                <button id="create-account">Create Account</button>
                <button id="forgot-password">Forgot Password?</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginButton = document.getElementById("login-button");
            const createAccountButton = document.getElementById("create-account");
            const forgotPasswordButton = document.getElementById("forgot-password");
            const usernameInput = document.getElementById("username");
            const passwordInput = document.getElementById("password");

            loginButton.addEventListener("click", function() {
                // Validate username and password
                const username = usernameInput.value.trim();
                const password = passwordInput.value.trim();
                if (username === "" || password === "") {
                    alert("Please enter both username and password.");
                    return;
                }

                // Handle login
                console.log("Login with username:", username, "and password:", password);
            });

            createAccountButton.addEventListener("click", function() {
                // Handle creating a new account
                console.log("Creating a new account...");
            });

            forgotPasswordButton.addEventListener("click", function() {
                // Handle forgot password
                console.log("Forgot password...");
            });
        });
    </script>
</body>
</html>
