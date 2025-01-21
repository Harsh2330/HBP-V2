<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME BASED PALLIATIVE CARE</title>
    <link rel="stylesheet" href="/css/style.css">
</head> 
    
<body>
    <header>
        <h1 style="color: #072f93;">HOME BASED PALLIATIVE CARE</h1> <!-- dark blue -->
        <nav>
            <a href="#" style="margin-right: 2rem;">Home</a>
            <a href="#" style="margin-right: 2rem;">Services</a>
            <a href="#" style="margin-right: 2rem;">About Us</a>
            <a href="{{ route('login') }}" style="margin-right: 2rem;">Login</a>
            <a href="{{ route('register') }}">Register</a>
            <ul>
        <li><a href="{{ route('case-paper.select-user') }}">Select User</a></li>
        <!-- Add other links as needed -->
        <li><a href="{{ route('case-paper.select-user-and-records') }}">Select User and View Records</a></li>
    </ul>
        </nav>
    </header>
    <main>
        <img src="/image/logo.png.png" alt="Logo" class="logo" style="width: 300px; height: auto; margin-top: -1rem;">
        <img src="/image/patient.png" alt="patient" class="patient-image" > <!-- Shifted the patient image to the right side -->        
        <div style="margin-top: -2rem;"> <!-- Moved the first paragraph upward -->
            <p class="limited-width">
            Home-based palliative care is a specialized medical service providing comprehensive support to individuals with serious, life-limiting illnesses at home, focusing on enhancing quality of life by addressing physical, emotional, social, and spiritual needs through a multidisciplinary team delivering personalized care.<br>
            <br>
            <br>
            ઘરઆધારિત પેલિયેટિવ કેર એ આરોગ્યસેવાની એવી સેવા છે જે ગંભીર, દીર્ઘકાળિન અથવા અંતિમ ચરણની બિમારીઓ ધરાવતા દર્દીઓને તેમના ઘરની આરામદાયક પરિસ્થિતિમાં પૂરી પાડવામાં આવે છે. તેનું મુખ્ય ઉદ્દેશ્ય દર્દીઓ અને તેમના પરિવારજનોની શારીરિક, ભાવનાત્મક, સામાજિક અને આધ્યાત્મિક જરૂરિયાતોને ધ્યાનમાં રાખીને તેમની જીવનની ગુણવત્તામાં સુધારો લાવવાનો છે.
            </p>
        </div>
    </main>
    <footer>
        <!DOCTYPE html>
        
    </footer>
</body>
</html>