<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   HOME BASED PALLATIVE
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-color: rgb(210, 187, 10);
            background-image: url('');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            animation: fadeIn 1s ease-in-out;
        }
   @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
   .hidden {
    display: none;
  }
  .container {
    animation: slideIn 0.5s ease-in-out;
  }

  @keyframes slideIn {
    from {
      transform: translateY(-50px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .nav-button {
    transition: transform 0.3s;
  }

  .nav-button:hover {
    transform: scale(1.1);
  }

  .bg-white {
    animation: popIn 0.5s ease-in-out;
  }

  @keyframes popIn {
    from {
      transform: scale(0.9);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  .form-content {
    transition: transform 0.3s, opacity 0.3s;
  }

  .form-content.hidden {
    transform: scale(0.9);
    opacity: 0;
  }
  </style>
 </head>
 <body class="text-white">
  <div class="container mx-auto p-4">
   <div class="flex justify-between items-center">
    <nav class="space-x-4 text-white-400">
     <a class="hover:underline" href="#">
      Dashboard
     </a>
     <span>
      •
     </span>
     <a class="hover:underline" href="#">
      Check Enrolment Status
     </a>
     <span>
      •
     </span>
     <a class="hover:underline" href="#">
      Login with CSC
     </a>
    </nav>
   </div>
   <div class="flex flex-col lg:flex-row justify-between mt-16">
    <div class="lg:w-1/2 text-center lg:text-left">
     <img alt="AgriStack Logo" class="mx-auto lg:mx-0 mb-4" height="80" src="/image/logo.png" width="250"/>
     <h1 class="text-white lg:text-4xl font-bold">
      HOME BASED PALLATIVE
     </h1>
     <p class="mt-4 text-white-400 lg:text-base">
        Home-based palliative care provides comprehensive medical and emotional support to patients with serious illnesses in the comfort of their homes. It focuses on improving quality of life through pain management, symptom relief, and holistic care tailored to individual needs.
        </p>
     <p class="mt-4 text-white-400 lg:text-base">
        ઘર આધારિત પેલિયેટિવ કેર ગંભીર બિમારીઓ ધરાવતા દર્દીઓને તેમના ઘરનાં આરામદાયક વાતાવરણમાં વ્યાપક તબીબી અને ભાવનાત્મક સહાય પૂરી પાડે છે. તે વ્યક્તિગત જરૂરિયાતો મુજબ દર્દીની જીવન ગુણવત્તામાં સુધારો લાવવા માટે દુખાવાના નિદાન, લક્ષણ રાહત અને સમગ્ર દેખભાળ પર ધ્યાન કેન્દ્રિત કરે છે.
     </p>
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      
     <div class="bg-white text-black rounded-lg shadow-lg p-8 w-full max-w-md">
      <img alt="Government Logo" class="mx-auto mb-4" height="80" src="https://scontent.fbdq2-1.fna.fbcdn.net/v/t39.30808-1/326515873_584542740354152_4450794918259430274_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=102&ccb=1-7&_nc_sid=2d3e12&_nc_ohc=tAtKSlk5s9sQ7kNvgH3ts4O&_nc_zt=24&_nc_ht=scontent.fbdq2-1.fna&_nc_gid=A2ukC8HWtKKAMdr0zVlbt1n&oh=00_AYBmighgb_1g7CrVZGZ0VL7nyrcp0_LfzVZs2_uRU4TtJw&oe=67795FEF" width="150"/>
      <h2 class="text-center text-lg lg:text-xl font-bold mb-4">
       Log In Form
      </h2>
      <div id="doctor-form" class="form-content">
        <input class="w-full p-2 border border-gray-300 rounded mb-4" id="email" class="block mt-1 w-full" placeholder="Enter e-mail" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
        <div class="flex items-center mb-4">
         <input class="w-full p-2 border border-gray-300 rounded mb-4" id="password" placeholder="Enter password" class="block mt-1 w-full"
         type="password"
         name="password" required autocomplete="current-password"/>
        </div>
        <a class="text-green-500 text-sm mb-4 block text-right" href="#">
         Forgot Password?
        </a>
        
        <button class="w-full bg-blue-300 text-gray-500 p-2 rounded" >
          {{ __('Log in') }}
        </button>
        </form>
      </div>
     </div>
    </div>
   </div>
  </div>