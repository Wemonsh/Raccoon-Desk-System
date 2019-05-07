<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// News
Route::group(['prefix' => 'news'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'News\NewsController@getNewsList', 'as' => 'news']);
    Route::get('/post/{id}' ,['uses' => 'News\NewsController@getNews'])->where(['id' => '[0-9]+']);
    Route::match(['get', 'post'], '/post/create' ,['uses' => 'News\NewsController@createNews', 'as' => 'createNews']);
    Route::match(['get', 'post'], '/post/edit/{id}', ['uses' => 'News\NewsController@editNews', 'as' => 'editNews']);
    Route::get('/post/delete/{id}' ,['uses' => 'News\NewsController@deleteNews']);
    Route::match(['get', 'post'], '/category/{id}', ['uses' => 'News\NewsController@showCategory', 'as' => 'newsCategory']);
    Route::match(['get', 'post'], '/search', ['uses' => 'News\NewsController@searchNews', 'as' => 'searchNews']);
});

// Knowledge Base
Route::group(['prefix' => 'knowledge'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Knowledge\KnowledgeController@index', 'as' => 'knowledge']);
    Route::match(['get', 'post'], '/article/create', ['uses' => 'Knowledge\KnowledgeController@create', 'as' => 'knowledgeCreate']);
    Route::match(['get', 'post'], '/article/show/{id}', ['uses' => 'Knowledge\KnowledgeController@show', 'as' => 'knowledgeShow']);
    Route::match(['get', 'post'], '/search', ['uses' => 'Knowledge\KnowledgeController@search', 'as' => 'knowledgeSearch']);
    Route::match(['get', 'post'], '/category/{id}', ['uses' => 'Knowledge\KnowledgeController@showCategory', 'as' => 'knowledgeCategory']);
    Route::match(['get', 'post'], '/article/edit/{id}', ['uses' => 'Knowledge\KnowledgeController@edit', 'as' => 'knowledgeEdit']);
});

// Crypto
Route::group(['prefix' => 'crypto'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Crypto\CryptoController@index', 'as' => 'crypto']);

    // Organization
    Route::match(['get', 'post'], '/organizations', ['uses' => 'Crypto\CryptoOrganizationsController@index', 'as' => 'cryptoOrganizationsIndex']);
    Route::match(['get', 'post'], '/organizations/show/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@show', 'as' => 'cryptoOrganizationsShow']);
    Route::match(['get', 'post'], '/organizations/create', ['uses' => 'Crypto\CryptoOrganizationsController@create', 'as' => 'cryptoOrganizationsCreate']);
    Route::match(['get', 'post'], '/organizations/edit/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@edit', 'as' => 'cryptoOrganizationsEdit']);
    Route::match(['get', 'post'], '/organizations/delete/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@delete', 'as' => 'cryptoOrganizationsDelete']);
    Route::match(['get', 'post'], '/organizations/api-response', ['uses' => 'Crypto\CryptoOrganizationsController@apiResponse']);

    // InformationSystems
    Route::match(['get', 'post'], '/info-systems', ['uses' => 'Crypto\CryptoInformationSystemController@index', 'as' => 'cryptoInfoSystemIndex']);
    Route::match(['get', 'post'], '/info-systems/create', ['uses' => 'Crypto\CryptoInformationSystemController@create', 'as' => 'cryptoInfoSystemCreate']);
    Route::match(['get', 'post'], '/info-systems/edit/{id}', ['uses' => 'Crypto\CryptoInformationSystemController@edit', 'as' => 'cryptoInfoSystemEdit']);
    Route::match(['get', 'post'], '/info-systems/delete/{id}', ['uses' => 'Crypto\CryptoInformationSystemController@delete', 'as' => 'cryptoInfoSystemDelete']);
    Route::match(['get', 'post'], '/info-systems/api-response', ['uses' => 'Crypto\CryptoInformationSystemController@apiResponse']);

    // Assignments
    Route::match(['get', 'post'], '/assignments', ['uses' => 'Crypto\CryptoAssignmentsController@index', 'as' => 'cryptoAssignmentsIndex']);
    Route::match(['get', 'post'], '/assignments/create', ['uses' => 'Crypto\CryptoAssignmentsController@create', 'as' => 'cryptoAssignmentsCreate']);
    Route::match(['get', 'post'], '/assignments/edit/{id}', ['uses' => 'Crypto\CryptoAssignmentsController@edit', 'as' => 'cryptoAssignmentsEdit']);
    Route::match(['get', 'post'], '/assignments/delete/{id}', ['uses' => 'Crypto\CryptoAssignmentsController@delete', 'as' => 'cryptoAssignmentsDelete']);
    Route::match(['get', 'post'], '/assignments/api-response', ['uses' => 'Crypto\CryptoAssignmentsController@apiResponse']);

    // Storage
    Route::match(['get', 'post'], '/storages', ['uses' => 'Crypto\CryptoStoragesController@index', 'as' => 'cryptoStoragesIndex']);
    Route::match(['get', 'post'], '/storages/create', ['uses' => 'Crypto\CryptoStoragesController@create', 'as' => 'cryptoStoragesCreate']);
    Route::match(['get', 'post'], '/storages/edit/{id}', ['uses' => 'Crypto\CryptoStoragesController@edit', 'as' => 'cryptoStoragesEdit']);
    Route::match(['get', 'post'], '/storages/delete/{id}', ['uses' => 'Crypto\CryptoStoragesController@delete', 'as' => 'cryptoStoragesDelete']);
    Route::match(['get', 'post'], '/storages/api-response', ['uses' => 'Crypto\CryptoStoragesController@apiResponse']);

    // Certificates
    Route::match(['get', 'post'], '/certificates', ['uses' => 'Crypto\CryptoCertificatesController@index', 'as' => 'cryptoCertificatesIndex']);
    Route::match(['get', 'post'], '/certificates/create', ['uses' => 'Crypto\CryptoCertificatesController@create', 'as' => 'cryptoCertificatesCreate']);
    Route::match(['get', 'post'], '/certificates/edit/{id}', ['uses' => 'Crypto\CryptoCertificatesController@edit', 'as' => 'cryptoCertificatesEdit']);
    Route::match(['get', 'post'], '/certificates/delete/{id}', ['uses' => 'Crypto\CryptoCertificatesController@delete', 'as' => 'cryptoCertificatesDelete']);
    Route::match(['get', 'post'], '/certificates/api-response', ['uses' => 'Crypto\CryptoCertificatesController@apiResponse']);

    // Models
    Route::match(['get', 'post'], '/mcpi-models', ['uses' => 'Crypto\CryptoMcpiModelsController@index', 'as' => 'cryptoMcpiModelsIndex']);
    Route::match(['get', 'post'], '/mcpi-models/create', ['uses' => 'Crypto\CryptoMcpiModelsController@create', 'as' => 'cryptoMcpiModelsCreate']);
    Route::match(['get', 'post'], '/mcpi-models/edit/{id}', ['uses' => 'Crypto\CryptoMcpiModelsController@edit', 'as' => 'cryptoMcpiModelsEdit']);
    Route::match(['get', 'post'], '/mcpi-models/delete/{id}', ['uses' => 'Crypto\CryptoMcpiModelsController@delete', 'as' => 'cryptoMcpiModelsDelete']);
    Route::match(['get', 'post'], '/mcpi-models/api-response', ['uses' => 'Crypto\CryptoMcpiModelsController@apiResponse']);

    // Instance
    Route::match(['get', 'post'], '/mcpi-instances', ['uses' => 'Crypto\CryptoMcpiInstanceController@index', 'as' => 'cryptoMcpiInstanceIndex']);
    Route::match(['get', 'post'], '/mcpi-instances/create', ['uses' => 'Crypto\CryptoMcpiInstanceController@create', 'as' => 'cryptoMcpiInstanceCreate']);
    Route::match(['get', 'post'], '/mcpi-instances/edit/{id}', ['uses' => 'Crypto\CryptoMcpiInstanceController@edit', 'as' => 'cryptoMcpiInstanceEdit']);
    Route::match(['get', 'post'], '/mcpi-instances/delete/{id}', ['uses' => 'Crypto\CryptoMcpiInstanceController@delete', 'as' => 'cryptoMcpiInstanceDelete']);
    Route::match(['get', 'post'], '/mcpi-instances/api-response', ['uses' => 'Crypto\CryptoMcpiInstanceController@apiResponse']);

});


Route::group(['prefix' => 'requests'], function () {
    Route::match(['get', 'post'], '/create', ['uses' => 'Requests\RequestsController@create', 'as' => 'requestsCreate']);
    Route::match(['get', 'post'], '/created', ['uses' => 'Requests\RequestsController@created', 'as' => 'requestsCreated']);
    Route::match(['get', 'post'], '/search', ['uses' => 'Requests\RequestsController@search', 'as' => 'requestsSearch']);
    Route::match(['get', 'post'], '/accepted/{id?}', ['uses' => 'Requests\RequestsController@accepted', 'as' => 'requestsAccepted'])->where(['id' => '[0-9]+']);
    Route::match(['get', 'post'], '/received/{id?}', ['uses' => 'Requests\RequestsController@received', 'as' => 'requestsReceived'])->where(['id' => '[0-9]+']);
    Route::match(['get', 'post'], '/show/{id}', ['uses' => 'Requests\RequestsController@show', 'as' => 'requestsShow'])->where(['id' => '[0-9]+']);
    Route::match(['get', 'post'], '/history', ['uses' => 'Requests\RequestsController@history', 'as' => 'requestsHistory']);
    Route::match(['get', 'post'], '/reports', ['uses' => 'Requests\RequestsController@reports', 'as' => 'requestsReports']);
});

Route::group(['prefix' => 'social'], function () {
    Route::match(['get', 'post'], '/messages/{id?}', ['uses' => 'Social\MessageController@index', 'as' => 'messagesIndex']);
    Route::match(['get', 'post'], '/message/send', ['uses' => 'Social\MessageController@send', 'as' => 'messageSend']);
});


//Route::match(['get'], '/events', ['uses' => 'Social\EventsController@index', 'as' => 'eventsIndex']);
//Route::match(['post'], '/events', ['uses' => 'Social\EventsController@addEvent', 'as' => 'eventsAdd']);


Route::get('events', 'Social\EventsController@index')->name('events.index');
Route::post('events', 'Social\EventsController@addEvent')->name('events.add');

Route::group(['prefix' => 'inventory'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Inventory\HomeController@index', 'as' => 'inventoryIndex']);

    // Counterparty
    Route::match(['get', 'post'], '/counterparty', ['uses' => 'Inventory\CounterpartyController@index', 'as' => 'counterpartyIndex']);
    Route::match(['get', 'post'], '/counterparty/create', ['uses' => 'Inventory\CounterpartyController@create', 'as' => 'counterpartyCreate']);
    Route::match(['get', 'post'], '/counterparty/api-response', ['uses' => 'Inventory\CounterpartyController@apiResponse']);
    Route::match(['get', 'post'], '/counterparty/edit/{id}', ['uses' => 'Inventory\CounterpartyController@edit', 'as' => 'counterpartyEdit']);

    // Manufactures
    Route::match(['get', 'post'], '/manufactures', ['uses' => 'Inventory\ManufacturesController@index', 'as' => 'manufacturesIndex']);
    Route::match(['get', 'post'], '/manufactures/create', ['uses' => 'Inventory\ManufacturesController@create', 'as' => 'manufacturesCreate']);
    Route::match(['get', 'post'], '/manufactures/api-response', ['uses' => 'Inventory\ManufacturesController@apiResponse']);
    Route::match(['get', 'post'], '/manufactures/edit/{id}', ['uses' => 'Inventory\ManufacturesController@edit', 'as' => 'manufacturesEdit']);

    // Types
    Route::match(['get', 'post'], '/types', ['uses' => 'Inventory\TypesController@index', 'as' => 'typesIndex']);
    Route::match(['get', 'post'], '/types/create', ['uses' => 'Inventory\TypesController@create', 'as' => 'typesCreate']);
    Route::match(['get', 'post'], '/types/api-response', ['uses' => 'Inventory\TypesController@apiResponse']);
    Route::match(['get', 'post'], '/types/edit/{id}', ['uses' => 'Inventory\TypesController@edit', 'as' => 'typesEdit']);

    // Organizations
    Route::match(['get', 'post'], '/organizations', ['uses' => 'Inventory\OrganizationsController@index', 'as' => 'organizationsIndex']);
    Route::match(['get', 'post'], '/organizations/create', ['uses' => 'Inventory\OrganizationsController@create', 'as' => 'organizationsCreate']);
    Route::match(['get', 'post'], '/organizations/api-response', ['uses' => 'Inventory\OrganizationsController@apiResponse']);
    Route::match(['get', 'post'], '/organizations/edit/{id}', ['uses' => 'Inventory\OrganizationsController@edit', 'as' => 'organizationsEdit']);

    // Placements
    Route::match(['get', 'post'], '/placements', ['uses' => 'Inventory\PlacementsController@index', 'as' => 'placementsIndex']);
    Route::match(['get', 'post'], '/placements/create', ['uses' => 'Inventory\PlacementsController@create', 'as' => 'placementsCreate']);
    Route::match(['get', 'post'], '/placements/api-response', ['uses' => 'Inventory\PlacementsController@apiResponse']);
    Route::match(['get', 'post'], '/placements/edit/{id}', ['uses' => 'Inventory\PlacementsController@edit', 'as' => 'placementsEdit']);

    // CounterpartyContracts
    Route::match(['get', 'post'], '/counterparty-contracts', ['uses' => 'Inventory\CounterpartyContractsController@index', 'as' => 'counterpartyContractsIndex']);
    Route::match(['get', 'post'], '/counterparty-contracts/create', ['uses' => 'Inventory\CounterpartyContractsController@create', 'as' => 'counterpartyContractsCreate']);
    Route::match(['get', 'post'], '/counterparty-contracts/api-response', ['uses' => 'Inventory\CounterpartyContractsController@apiResponse']);
    Route::match(['get', 'post'], '/counterparty-contracts/edit/{id}', ['uses' => 'Inventory\CounterpartyContractsController@edit', 'as' => 'counterpartyContractsEdit']);
    Route::match(['get', 'post'], '/counterparty-contracts/control', ['uses' => 'Inventory\CounterpartyContractsController@control', 'as' => 'counterpartyContractsControl']);
    Route::match(['get', 'post'], '/counterparty-contracts/control-api-response', ['uses' => 'Inventory\CounterpartyContractsController@controlApiResponse']);

    // Devices
    Route::match(['get', 'post'], '/devices/create', ['uses' => 'Inventory\DevicesController@create', 'as' => 'devicesCreate']);
    Route::match(['get', 'post'], '/devices', ['uses' => 'Inventory\DevicesController@index', 'as' => 'devicesIndex']);
    Route::match(['get', 'post'], '/devices/api/getTypes', ['uses' => 'Inventory\DevicesController@getTypes']);
    Route::match(['get', 'post'], '/devices/api-response', ['uses' => 'Inventory\DevicesController@apiResponse']);
    Route::match(['get', 'post'], '/devices/edit/{id}', ['uses' => 'Inventory\DevicesController@edit', 'as' => 'devicesEdit']);

    // Inventories
    Route::match(['get', 'post'], '/inventories/', ['uses' => 'Inventory\InventoriesController@index', 'as' => 'inventoriesIndex']);
    Route::match(['get', 'post'], '/inventories/create', ['uses' => 'Inventory\InventoriesController@create', 'as' => 'inventoriesCreate']);
    Route::match(['get', 'post'], '/inventories/api-response', ['uses' => 'Inventory\InventoriesController@apiResponse']);
    Route::match(['get', 'post'], '/inventories/edit/{id}', ['uses' => 'Inventory\InventoriesController@edit', 'as' => 'inventoriesEdit']);
    Route::match(['get', 'post'], '/inventories/workplace-api-response', ['uses' => 'Inventory\InventoriesController@workplaceApiResponse']);
    Route::match(['get', 'post'], '/inventories/workplace', ['uses' => 'Inventory\InventoriesController@workplace', 'as' => 'inventoriesWorkplace']);
    Route::match(['get', 'post'], '/inventories/show/{id}', ['uses' => 'Inventory\InventoriesController@show', 'as' => 'inventoriesShow']);

});