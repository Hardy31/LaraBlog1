<?php



define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());
//$response->send();
//$kernel->terminate($request, $response);






/*namespace App;


class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testGeneratePassword()
    {

    }
}
*/
namespace app;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

$user = new AuthController();


echo 'UserTest' . PHP_EOL;
