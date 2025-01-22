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
                            <label for="" class="form__label">First Name</label>
                            <input class="form__input" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Middle Name</label>
                            <input class="form__input" type="text" name="middle_name" :value="old('middle_name')" autocomplete="middle_name">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Last Name</label>
                            <input class="form__input" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-calendar'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Date of Birth</label>
                            <input class="form__input" type="date" name="date_of_birth" :value="old('date_of_birth')" required autocomplete="date_of_birth">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-phone'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Phone Number</label>
                            <input class="form__input" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-envelope'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Email</label>
                            <input class="form__input" type="email" name="email" :value="old('email')" required autocomplete="email">
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
