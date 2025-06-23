<body style="margin:0; min-height:100vh; display:flex; flex-direction:column;">

    <main style="flex:1;">
        </main>

    <footer class="page-footer" style="background-color: #333;">
        <div class="footer-copyright" style="background-color: #222;">
            <div class="container center-align" style="color:white; padding:10px;">
                © 2025 Todos os direitos reservados para João Carlos e Hugo Pecoraro (2°BCC)
            </div>
        </div>
    </footer>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large modal-trigger" href="#credits-modal" style="background-color: #02ccbf;">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf == '' || cpf.length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
            var add = 0;
            for (var i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
            var rev = 11 - (add % 11);
            if (rev == 10 || rev == 11) rev = 0;
            if (rev != parseInt(cpf.charAt(9))) return false;
            add = 0;
            for (i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11) rev = 0;
            if (rev != parseInt(cpf.charAt(10))) return false;
            return true;
        }

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

            $('.cpf').mask('000.000.000-00', {reverse: true});

            $('#form-cliente').submit(function(event) {
                var cpfInput = $('#cpf').val();
                if (cpfInput && !validarCPF(cpfInput)) {
                    event.preventDefault();
                    M.toast({html: 'CPF inválido! Verifique o número digitado.', classes: 'red darken-2'});
                }
            });
        });
    </script>
</body>