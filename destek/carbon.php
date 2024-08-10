\\Carbon\\Carbon, PHP dilinde tarih ve saat manipülasyonu için kullanılan popüler bir kütüphanedir. 
Bu kütüphane, tarih ve saat nesnelerini kolayca oluşturmanıza, biçimlendirmenize, karşılaştırmanıza ve manipüle etmenize olanak tanır.

Laravel'in de dahili olarak kullandığı Carbon, daha fazla işlevsellik sunar ve PHP'nin standart 
DateTime sınıfından daha kullanıcı dostudur. Carbon, PHP'nin tarih ve saat işlemlerini daha esnek 
ve okunabilir hale getirir.

use Carbon\Carbon;

$now = Carbon::now();

echo $now->format('Y-m-d H:i:s');
$yesterday = Carbon::now()->subDay();
$tomorrow = Carbon::now()->addDay();

if ($tomorrow->gt($yesterday)) {
    echo "Yarın, dünden daha ileride.";
}
Bu kod örneğinde, Carbon ile yarını dünden büyük mü diye kontrol ediliyor.

X Bir tarih ile zaman nesnesi oluşturmak 
Carbon::create(2023,9,27,0,0,'Europe/Istanbul');

Şu anı timestring olarak almak istersen
now()->toTimeString()

Zamanı formatlamak
{{ $post->published_at->toFormattedDateString() }}

Zamanı formatlamak 2 
{{ $comment->created_at->format('M j, Y \a\t g:i a') }}

Zamanı formatlamak 3 
\Carbon\Carbon::parse($company->type_end_date)->translatedFormat('j F Y, H:i')

X bir tarihin (start_date) Y hafta sonrası(key)
Carbon::parse($classroom->start_date)->addWeeks($key);

Bir günün haftanın kaçıncı günü olduğunu hesaplamak için (Pazar = 0... Cumartesi = 6) 
Carbon::today()->dayOfWeek

Bugüne göre... ay sonu + 1 yıl
\Carbon\Carbon::now()->endOfMonth()->addYear(1)->translatedFormat('j F Y')

Bu hafta yılın kaçıncı haftası? 
Carbon::now()->weekOfYear

Haftanın kaçıncı günü olduğunu Pazartesi = 1... Pazar = 7 olacak şekilde yapmak istersen 
$trWeekDays = [
    0 => 7, // pazar
    1 => 1, // pazartesi
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
];

return $trWeekDays[Carbon::today()->dayOfWeek];

X tarihinin hafta başlangıcını ve hafta bitimini (hafta başlangıcını ve bitimini de istediğin gibi ayarlayarak) bulmak istersen 
$now = Carbon::now();

$hafta_baslangici = $now->startOfWeek(Carbon::TUESDAY);
$hafta_sonu = $now->endOfWeek(Carbon::MONDAY);

$weekStartDate = $hafta_baslangici->format('Y-m-d H:i'); // string(16) "2021-10-02 00:00"
$weekEndDate = $hafta_baslangici->format('Y-m-d H:i'); // string(16) "2021-10-08 23:59"


Türkçe düzgün şekilde tarihi yazdırmak istersen öncelikle config dosyasında Türkçe ve saat dilimi için ayar yapmamız lazım. 

'timezone' => 'Europe/Istanbul',
'locale' => 'tr_TR',
'fallback_locale' => 'tr',

Şimdi de Türkçe için formatlayalım. 
return \Carbon\Carbon::parse($this->created_at)->translatedFormat('j F Y, l H:i');


Kişinin anlayacağı şekilde tarihin ne kadar önce olduğunu görtermesini istersek 
\Carbon\Carbon::parse($field->updated_at)->diffForHumans()


Bir tarihten bir saat çıkarmak için subHour() metodu kullanabilirsin 
now()->subHour()



Form'da Date ile Çalışmak
<input class="form-control" type="datetime" name="timestamp" value="{{ $chapter->created_at }}">

<div class="form-group">
   <label for="start_date">Abonelik Başlangıç:</label>
   <input type="date"
      class="form-control"
	  id="start_date"
      name="start_date"
      value="{{ \Carbon\Carbon::parse($subscription->start_date)->translatedFormat('Y-m-d') }}">
</div>























