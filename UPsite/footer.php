<footer class="footer">

    <div class="footer-content">

        <div>
            <h4>Контакты</h4>
            <p>
                +7-(937)-508-00-00<br>
                г. Москва<br>
                VK • Telegram • Discord
            </p>
        </div>

        <div>
            <h4>Навигация</h4>
            <a href="http://UPsite/index.php">Главная</a>
            <a href="http://UPsite/Services/services.php">Услуги</a>
            <a href="http://UPsite/Tariffs/tariffs.php">Тарифы</a>
            <a href="http://UPsite/Contacts/contacts.php">Контакты</a>
        </div>

    </div>

    <p class="copyright">© 2026 Телеграф</p>

    <?php if(isset($_SESSION['toast'])): ?>
    <div id="toast" class="toast">
        <?= $_SESSION['toast'] ?>
    </div>
    <?php unset($_SESSION['toast']); endif; ?>

    <script>
        const toast = document.getElementById('toast');

        if (toast) {
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => toast.classList.remove('show'), 3000);
        }
    </script>

</footer>