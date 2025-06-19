<body style="margin:0; min-height:100vh; display:flex; flex-direction:column;">

    <main style="flex:1;">
        <!-- Aqui vai o conteúdo da sua página -->
    </main>

    <footer class="page-footer" style="background-color: #333;">
        <div class="footer-copyright" style="background-color: #222;">
            <div class="container center-align" style="color:white; padding:10px;">
                © 2025 Todos os direitos reservados para João Carlos e Hugo Pecoraro (2°BCC)
            </div>
        </div>
    </footer>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large modal-trigger" href="#credits-modal" style="background-color: black;">
            <i class="large material-icons">info</i>
        </a>
    </div>

    <div id="credits-modal" class="modal">
        <div class="modal-content">
            <h4>Trabalho PHP - 1° Semestre</h4>
            <p>Curso de Ciência da Computação</p>
            <div class="divider"></div>
            <h5>Créditos:</h5>
            <p>
                João Carlos Vinhato Batista da Silva<br>
                Hugo Pecoraro da Silva
            </p>
            <h5>Agradecimentos:</h5>
            <p>Agradecemos ao Prof° Almir, pela paciência e instrução.</p>
            <div class="divider"></div>
            <p class="right-align">
                <strong>2°BCC da FEMA 2025</strong>
            </p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.sidenav').sidenav();
            $('select').formSelect();
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true,
                i18n: { /* ... */ }
            });
            $('.modal').modal();
            $('.fixed-action-btn').floatingActionButton();
        });
    </script>
</body>
