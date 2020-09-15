<?php
declare(strict_types=1);

use App\Application\Actions\DailyReport\ListDailyReportAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\DailyReport\SubmitDailyReportAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/daily-report', function(Group $group) {
        $group->post('', SubmitDailyReportAction::class);
        $group->get('/reportLists', ListDailyReportAction::class);
    });

    $app->get('/test', function (Request $request, Response $response) {
        $db = $this->get('db');
        $data = array('message' => 'Hello I am Slim!');
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    });
};
