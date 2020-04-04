
<div class="container-fluid">
        <div class="row">
            <div class="btn-group col-md-12 p-0" role="group" aria-label="Basic example">
                <button id="dashbord" type="button" class="btn btn-secondary col-md-4">Principal</button>
                <button type="button" class="btn btn-secondary col-md-4">Em Andamento</button>
                <button type="button" class="btn btn-secondary col-md-4">Concluidos</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row" id="lines">
                </div>
            </div>
        </div>
</div>

<!-- <h2 class="cabecalho">Cadastrar Usuário</h2>
<div class="cadastrar-usuario">
    <form action="cadastrar_usuario_commit.php" method="POST">
        <input type="text" placeholder="Usuário cadastre-se aqui" name="txtuser">
        <input type="password" placeholder="escolha uma senha" name="txtpass">
        <button>Cadastrar</button>
    </form>
</div> -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->


<script>

        
        $.getJSON("request_ajax_data.php", "users=users", function( data ) {
            console.log(data);
            window.data = data;

            $(() => {
                $('button#dashbord').click(function () {
        console.log('button');
            var data = window.data;
            [...data].forEach((user, index) => {
                    if (!$('div#line-' + index).length)  {
                        var row = document.createElement('div');
                        $(row).attr('class', 'd-flex justify-content-between align-items-center w-100 border');
                        $(row).attr('id', 'line-' + index);
                        $('#lines').append(row);
                        var keys = Object.keys(user);
                        var modalContent = document.createElement('div');
                        $(modalContent).attr('class', 'modal-content');
                        var modalForm = document.createElement('form');
                        $(modalForm).attr('action', 'cadastrar_usuario_commit.php');
                        $(modalForm).attr('method', 'POST');
                        $(modalForm).attr('id', 'form-'+index);
                        var modalBody = document.createElement('div');
                        $(modalBody).attr('class', 'modal-body');
                        var modalHeader = document.createElement('div');
                        $(modalHeader).attr('class', 'modal-header');
                        modalHeader.innerHTML = `  <h4 class="modal-title">Registro do usuario</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>`;
                        var modalFooter = document.createElement('div');
                        $(modalFooter).attr('class', 'modal-footer');
                        $(modalFooter).attr('style', 'justify-content: space-between;');
                        modalFooter.innerHTML = '<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>'
                        $(modalContent).append(modalHeader);
                        $(modalContent).append(modalBody);
                        $(modalContent).append(modalFooter);
                        $(modalBody).append(modalForm);
                        keys.forEach(key => { 
                                var modalInput = document.createElement('div');
                                $(modalInput).attr('class', 'input-group mb-3');
                                modalInput.innerHTML = `
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">${key}</span>
                                </div>
                                <input type="text" name="${key}" class="form-control" value="${user[key]}" placeholder="${key}" aria-label="${key}" aria-describedby="basic-addon1">
                                </div>`;
                                $(modalForm).append(modalInput);
                                var el = document.createElement('a');
                                // $(el).attr('id', 'line-' + key);
                                $(el).attr('class', ' col-md-2');
                                // $(el).attr('data-placement', 'top');
                                // $(el).attr('data-toggle', 'popover');
                                // $(el).attr('title', key);
                                // $(el).attr('data-content', '');
                                $(el).attr('style', ' text-align:center;   padding: 10px;font-size: 14px;');
                                el.innerText = user[key];
                                $(row).append(el);
                        });
                    }
                    var submit = document.createElement('button');
                    $(submit).attr('class', "btn btn-primary");
                    $(submit).attr('type', "submit");
                    $(submit).attr('form', 'form-' + index);
                    submit.innerText = 'ok';
                    $(modalFooter).append(submit);
                    var modalButton = document.createElement('a');
                    $(modalButton).attr('data-toggle', 'modal');
                    $(modalButton).attr('href', '#userModal-' + index);
                    $(modalButton).attr('id', '#userBtn-' + index);
                    $(modalButton).attr('style', ' text-align:center;   padding: 10px;font-size: 14px;');
                    modalButton.innerText = 'open';
                    $(row).append(modalButton);
                    
                    $("#userBtn-" + index).click(function(){
                        $('#userModal-' + index).modal();
                    });
                    
                    var modal = document.createElement('div');
                    $(modal).attr('class', 'modal fade');
                    $(modal).attr('id', 'userModal-' + index);
                    $(modal).attr('role', 'dialog');

                    var modalDialog = document.createElement('div');
                    $(modalDialog).attr('class', 'modal-dialog modal-dialog-centered');
                    $(modalDialog).append(modalContent);
                    $(modal).append(modalDialog);

                    $('body').append(modal);
                });
            });
        });
    });
    
    $(function () {

    });


    function Line (...props) {
        this = document.createElement('div');
        this.innerHTML = `
            <div id="line-${props.index}"class="d-flex justify-content-between align-items-center w-100 border">
                ${props.array.map((item) => Label(item))}
                ${ModalButton()}
            </div>
        `;
        return this;
    }

    function ModalButton () {
        this = document.createElement('a');
        this.innerHTML = `
            <a id="button-modal-${props.index}" href="button-modal-${props.index}" data-toggle="modal" style="text-align:center;padding: 10px;font-size: 14px;">open</div>
        `;
        return this;
    }

    function Label (...props) {
        this = document.createElement('a');
        this.innerHTML = `
            <a class="col-md-2" style="text-align:center;padding: 10px;font-size: 14px;"></a>
        `;
        return this;
    }

    function Modal (...props) {
        this = document.createElement('div');
        this.innerHTML = `
        <div class="modal fade" id="userModal-${props.index}" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span>${props.title}</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <p>Not a member? <a href="#">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
                </div>
            </div>
            </div>
        </div>`;

        $(this).find('.modal-body').append(Form());

        return this;
    }

    function Form (...props) {
        this = document.createElement('form');
        this.innerHTML = `
            <form action="cadastrar_usuario_commit.php" method="POST">
                ${props.array.forEach((item) => Input(props))}
            </form>
        `;
        return this;
    }

    function Input (...props) {
        this = document.createElement('div');
        this.innerHTML = `
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">${props.key}</span>
            </div>
            <input type="text" name="${props.key}" class="form-control" value="${props.value}" placeholder="${props.value}" aria-label="${props.key}" aria-describedby="basic-addon1">
        </div>
        `;
        return this;
    }

   
        // <a class="btn btn-lg btn-danger"  data-placement="top" data-toggle="popover" title="Nome" data-content="">Nome</a>
</script>