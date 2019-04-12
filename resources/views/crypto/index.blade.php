@extends('layouts.knowledge')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Криптоключи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">СКЗИ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Справочники</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Отчеты</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-4">
                    <h2>Документы</h2>
                    <ul>
                        <li>Акт создания ключевых документов</li>
                        <li>Акт передачи ключевых документов</li>
                        <li>Акт ввода в эксплуатацию ключевой информации</li>
                        <li>Акт вывода из эксплуатации ключевой информации</li>
                        <li>Акт уничтожения ключевой информации</li>
                    </ul>
                </div>
                <div class="col-4">
                    <h2>Справочники</h2>
                    <ul>
                        <li>Ключевая информация</li>
                        <li>Носители ключевой информации</li>
                        <li>Назначения ключевой информации</li>
                        <li>Форматы ключевой информации</li>
                        <li>Информационные системы</li>
                        <li>Организации</li>
                        <li>Ответсвенные лица</li>
                        <li>Объекты информационной инфраструктуры</li>
                    </ul>
                </div>
                <div class="col-4">
                    <h2>Отчеты</h2>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
@endsection