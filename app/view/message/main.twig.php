{% extends "partials/body.twig.php" %}
{% block title %}
Pagina não Encontrada
{% endblock %}
{% block body %}
<div class="center-screen max-width bg-white padding">

    <div class="card border-danger mb-3">
        <div class="card-header"> <h4 class="card-title">{{title}}</h4></div>
        <div class="card-body">
           
            <p class="card-text">{{message}}</p>
        </div>
    </div>

</div>
{% endblock %}