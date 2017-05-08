<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 20:15
 */

$app->get('/','HomeController:index')->setName('home');
$app->group('', function()use($app){
    $app->get('/auth/signup','AuthController:getSignUp')->setName('auth.signup');
    $app->post('/auth/signup','AuthController:postSignUp');

    $app->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');
    $app->post('/auth/signin','AuthController:postSignIn');

})->add(new \App\Middleware\GuestMiddleware($container));


$app->group('', function ()use($app){
    $app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $app->get('/user/enroll', 'UserController:getEnroll')->setName('user.enroll');
    $app->post('/user/enroll', 'UserController:postEnroll');
    $app->get('/user/enroll/{userCareerId}','UserController:getEnrollSubjectsByStatus');
})->add(new \App\Middleware\AuthMiddleware($container));

$app->get('/subjects','SubjectController:getSubjects')->setName('subjects');
$app->get('/subject/{idCareer}','SubjectController:getSubject')->setName('subject');
$app->get('/careers', 'CareerController:getCareers')->setName('careers');


$app->get('/datatables/languaje', function($request, $response) use($container){
    $data = [
        'sEmptyTable' => 'No hay datos',
        'sInfo' => '_START_ a _END_. Total: _TOTAL_ Resultados',
        'sInfoEmpty' => 'Sin resultados',
        'sInfoFiltered' => '(Filtrado de _MAX_ Resultados)',
        'sInfoPostFix' => '',
        'sInfoThousands' => '.',
        'sLengthMenu' => '_MENU_ Resultados Mostrados',
        'sLoadingRecords' => 'Cargando...',
        'sProcessing' => 'Buscando...',
        'sSearch' => 'Buscar',
        'sZeroRecords' => 'No se encontraron resultados.',
        'oPaginate' =>
            [
                'sFirst' => 'Primero',
                'sPrevious' => 'Anterior',
                'sNext' => 'Siguiente',
                'sLast' => 'Ultimo',
            ],

        'oAria' =>
            [
                'sSortAscending' => ': Orden ascendente',
                'sSortDescending' => ': Orden descendente',
            ],
    ];
    /**
     * @var \Slim\Http\Response $response
     */
    return $response->withJson($data);
})->setname('datatable.languaje');