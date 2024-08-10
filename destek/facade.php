işte bir Laravel Facade örneği:

Varsayalım ki bir kullanıcının adını ve soyadını veritabanında saklamak istiyoruz. Laravel'in sunduğu Eloquent ORM'yi kullanarak bu kullanıcıları işleyebiliriz. Ancak her seferinde tam adını almak için uzun bir yol kullanmak yerine Facade kullanabiliriz.

Öncelikle, User modelimiz var:

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['first_name', 'last_name'];
}


Ve şimdi bu kullanıcıların tam adını almak için bir Facade oluşturalım. 
Bunun için Facade oluşturmak için app/Facades dizini altında UserFacade.php dosyasını oluşturabiliriz:

php artisan make:facade UserFacade



namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user'; // 'user' kelimesi, service container'a kayıtlı User sınıfının anahtarıdır.
    }
}


Şimdi bu Facade'i kullanarak bir kullanıcının tam adını alalım. 
Bu örnekte, User modelimize doğrudan erişmek yerine Facade'i kullanacağız:


use App\Facades\UserFacade;

$fullName = UserFacade::find(1)->fullName();

Burada UserFacade::find(1) çağrısı, User modelimizin bir örneğini alır ve 
daha sonra fullName() metodu çağrılır. Bu, uzun bir yol kullanmak yerine Facade 
kullanarak daha okunabilir ve hızlı bir şekilde kod yazmamızı sağlar.









