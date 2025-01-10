<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Registration Page</title>  
        <style>
            .shape1 {
                background-color:rgb(229, 196, 6); /* Change to desired color */
            }
            .shape2 {
                background-color:rgb(228, 209, 4); /* Change to desired color */
            }
        </style>
    </head>
    <body>
        <div class="l-form">
            <div class="shape1"></div>
            <div class="shape2"></div>

            <div class="form">
                <img src="/image/image.jpg" alt="" class="form__img">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="form__title">Register</h1>

                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Username</label>
                            <input  class="form__input"   type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-envelope'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Email</label>
                            <input  class="form__input"   type="email" name="email" :value="old('email')" required autocomplete="email">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Password</label>
                            <input type="password" class="form__input"  id="password"  name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Confirm Password</label>
                            <input type="password" class="form__input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
                    </div>

                    <button type="submit" class="form__button">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
        
        <!-- ===== MAIN JS ===== -->
        <script src="/js/main.js"></script>
    </body>
</html>
