@extends('layouts.default')

@section('content')
    <h1>Календарь</h1>
    <hr>


    <div class="row">
        <div class="col-9">
            <div class="container-fluid">
                <header>
                    <div class="row d-none d-sm-flex p-1 bg-dark text-white">
                        <h5 class="col-sm p-1 text-center">Sunday</h5>
                        <h5 class="col-sm p-1 text-center">Monday</h5>
                        <h5 class="col-sm p-1 text-center">Tuesday</h5>
                        <h5 class="col-sm p-1 text-center">Wednesday</h5>
                        <h5 class="col-sm p-1 text-center">Thursday</h5>
                        <h5 class="col-sm p-1 text-center">Friday</h5>
                        <h5 class="col-sm p-1 text-center">Saturday</h5>
                    </div>
                </header>
                <div class="row border border-right-0 border-bottom-0">
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">29</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">30</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">31</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">1</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">2</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">3</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-info text-white" title="Test Event 1">Test Event 1</a>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">4</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">5</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">6</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">7</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">8</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-success text-white" title="Test Event 2">Test Event 2</a>
                        <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-danger text-white" title="Test Event 3">Test Event 3</a>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">9</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">10</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">11</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">12</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">13</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">14</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">15</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">16</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">17</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">18</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">19</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">20</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-primary text-white" title="Test Event with Super Duper Really Long Title">Test Event with Super Duper Really Long Title</a>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">21</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">22</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">23</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">24</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">25</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">26</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">27</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">28</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">29</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                        <h5 class="row align-items-center">
                            <span class="date col-1">30</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">1</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">2</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">3</span>
                            <small class="col d-sm-none text-center text-muted">Sunday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">4</span>
                            <small class="col d-sm-none text-center text-muted">Monday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">5</span>
                            <small class="col d-sm-none text-center text-muted">Tuesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">6</span>
                            <small class="col d-sm-none text-center text-muted">Wednesday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">7</span>
                            <small class="col d-sm-none text-center text-muted">Thursday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">8</span>
                            <small class="col d-sm-none text-center text-muted">Friday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                        <h5 class="row align-items-center">
                            <span class="date col-1">9</span>
                            <small class="col d-sm-none text-center text-muted">Saturday</small>
                            <span class="col-1"></span>
                        </h5>
                        <p class="d-sm-none">No events</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>



@endsection