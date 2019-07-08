@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <button type="button" id="btn_permission">Permission</button>
                    <button type="button" id="btn_push">Push Notification</button>



                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var btnPermission = document.getElementById("btn_permission");
        if (Notification.permission !== "default") {
            btnPermission.style.display = "none";
        } else {
            btnPermission.style.display = "inline-block";
        }
        btnPermission.onclick = evt => {
            Notification.requestPermission();
        }

        function spawnNotification(opcoes) {
            var n = new Notification(opcoes.title, opcoes.opt);

            if (opcoes.link !== '') {
                n.addEventListener("click", function() {
                    n.close();
                    window.focus();
                    window.location.href = opcoes.link;
                });
            }
        }
        document.getElementById("btn_push").onclick = evt => {
            spawnNotification({
                opt: {
                    body: "Criando nova notificação",
                    icon: "notification-flat.png"
                },
                title: "Olá mundo!",
                link: "https://www.google.com.br/"
            })
        }
    });
</script>

@endsection