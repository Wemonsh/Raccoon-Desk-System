@extends('layouts.default')

@section('content')

<h1>Главная</h1>
<hr>
<p>Автоматизированная информационная система обработки обращений и ведения учета материально технических средств организации</p>

<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">26 Пользователей</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Подробнее</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5">11 статей</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Перейти в базу знаний</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="mr-5">123 заявки(ок) в службу технической поддержки</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Обратиться в поддержку</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                </div>
                <div class="mr-5">13 предстоящих событий в этом месяце</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Подробнее</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Аналитическое сравнение заявок пользователей</div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Обновлено {{ date('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Процентное соотношение заявок</div>
            <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Обновлено {{ date('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <h5 class="card-header">Новости</h5>

            <ul class="list-unstyled">
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media my-4">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media my-4">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
            </ul>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">Статьи</h5>

            <ul class="list-unstyled">
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media my-4">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media my-4">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
                <li class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection
