https://www.udemy.com/course/sifirdan-ileri-seviyeye-laravel-egitimi/learn/lecture/20778788#overview

hasOne :Laravel ORM'de kullanılan bir ilişki yöntemidir. Bu yöntem, bir modelin diğer bir modelle "bir ilişkisi" olduğunu ifade eder. Yani, bir modelin sadece bir diğer modelle ilişkili olduğu durumları temsil eder.
Örneğin, bir kullanıcının bir profil bilgisine sahip olması durumunu ele alalım. Her kullanıcının sadece bir profil bilgisi olabilir. Bu durumda, User (Kullanıcı) modeli ile Profile (Profil) modeli arasında bir ilişki vardır ve bu ilişki hasOne ile tanımlanabilir.
class User extends Model
{
    /**
     * Kullanıcının bir profil bilgisi olabilir.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
ukarıdaki örnekte, User modeli, profile yöntemini kullanarak hasOne ilişkisini tanımlar. Bu, User modeli ile Profile modeli arasında bir ilişki kurar. Bu ilişki, bir kullanıcının sadece bir profil bilgisine sahip olduğunu ifade eder.

Bu ilişkiyi kullandığınızda, bir kullanıcının profil bilgisini alabilirsiniz:
$user = User::find(1);
$profile = $user->profile;
Bu kod, belirli bir kullanıcının profil bilgisini içeren bir Profile modeli örneği döndürecektir.


---------------- 

hasMany : Laravel ORM (Object-Relational Mapping) ilişkilerinde kullanılan bir yöntemdir. Bu yöntem, bir modelin başka bir modelle "birçok ilişkisi" olduğunu ifade eder. Yani, bir modelin birden fazla diğer modelle ilişkili olduğu durumları temsil eder.
Örneğin, bir blog uygulamasında, bir kullanıcının birden fazla yazısı olabilir. Bu durumda, User (Kullanıcı) modeli ile Post (Yazı) modeli arasında birçok ilişki vardır. Bu ilişkiyi hasMany yöntemiyle tanımlayabilirsiniz.
class User extends Model
{
    /**
     * Kullanıcının birçok yazısı olabilir.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
Bu ilişkiyi kullandığınızda, bir kullanıcının tüm yazılarını alabilirsiniz:
$user = User::find(1);
$posts = $user->posts;

 -----------------
 

scope : veritabanından özel sorgulara tanımlayarak kullanma 


accessor :Laravel'deki "Accessor"lar, belirli bir model alanını veya niteliğini değiştirmek veya şekillendirmek için kullanılan yöntemlerdir. Bu, veritabanından bir değeri çekerken veya modele erişim sağlarken değeri otomatik olarak manipüle etmek için kullanışlıdır.
Örneğin, bir tarih alanını belirli bir biçime dönüştürmek istediğinizi düşünelim:
class Post extends Model
{
    // Tarih alanını istenen biçime dönüştüren bir accessor tanımlama
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}






imzalanmış url 
https://www.udemy.com/course/sifirdan-ileri-seviyeye-laravel-egitimi/learn/lecture/30153342#questions


