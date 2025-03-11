<link rel="stylesheet" href="{{ asset('storage/css/footer.css') }}">
<footer>
    <div class="footer-container">
        <div class="footer-links">
            <ul>
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('contact') }}">Nous contacter</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy;  {{ date('Y') }} LoL Tournois. All Rights Reserved</p>
        <p>Designed by <span id="valdragon">Valdragon</span></p>
    </div>
</footer>