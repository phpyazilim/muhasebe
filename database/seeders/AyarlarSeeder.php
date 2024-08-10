<?php


namespace Database\Seeders;

use App\Models\Ayarlar;
use Illuminate\Database\Seeder;

class AyarlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ayarlar::insert(
            [
                [ 'value' => 'firma_adi',         'name' => 'Atomedya', ],
                [ 'value' => 'firma_adres',       'name' => 'Aşkan Mah. Yaka Cad. NO:71/1 Meram / KONYA',  ],
                [ 'value' => 'firma_telefon',     'name' => '0 332 123 45 67',],
                [ 'value' => 'firma_gsm',         'name' => '0 505 000 00 00',  ],
                [ 'value' => 'firma_whatsap',     'name' => '0 505 111 11 11', ],
                [ 'value' => 'firma_email',       'name' => 'destek@atomedya.com.tr', ],
                [ 'value' => 'firma_ustlogo',     'name' => '/default/ustlogo.png', ],
                [ 'value' => 'firma_altlogo',     'name' => '/default/altlogo.png', ],
                [ 'value' => 'firma_harita',      'name' => '<!-- Harita Bilgisi -->', ],
                [ 'value' => 'firma_analytics',   'name' => '<!-- Google Analytics Bilgisi -->', ],
                [ 'value' => 'firma_facebook',    'name' => 'https://www.facebook.com/', ],
                [ 'value' => 'firma_instagram',   'name' => 'https://www.instagram.com/', ],
                [ 'value' => 'firma_youtube',     'name' => 'https://www.youtube.com/', ],
                [ 'value' => 'firma_twitter',     'name' => 'https://x.com/', ],
                [ 'value' => 'firma_linkedin',    'name' => 'https://tr.linkedin.com/', ],
                [ 'value' => 'firma_title',       'name' => 'Atomedya Reklam Ajansı', ],
                [ 'value' => 'firma_description', 'name' => 'Sizi reklam ederiz', ],
                [ 'value' => 'firma_keyword',     'name' => 'ajans,reklam,reklam ajansı', ],
                [ 'value' => 'firma_csskod',     'name' => '<!-- Custom Css -->', ],
                [ 'value' => 'firma_jskod',     'name' => '<!-- Custom Js  -->', ],
                [ 'value' => 'theme_color',       'name' => '#666', ],
                [ 'value' => 'slider_baslik_1',   'name' => 1, ],
                [ 'value' => 'slider_baslik_2',   'name' => 1, ],
                [ 'value' => 'slider_baslik_3',   'name' => 0, ],
                [ 'value' => 'slider_button',     'name' => 1, ],
                [ 'value' => 'slider_ikinci_resim','name' => 0, ],
                [ 'value' => 'slider_link','name' => 1, ],
                [ 'value' => 'categories_kullan','name' => 0, ],
                [ 'value' => 'categories_alt_kategori','name' => 0, ],
                [ 'value' => 'categories_resim_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_marka_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_dosya1_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_dosya2_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_dosya3_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_fiyat_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_onceki_fiyat_kullan','name' => 0, ],
                [ 'value' => 'urunlerde_bayi_fiyati','name' => 0, ],
                [ 'value' => 'urunlerde_urunkodu','name' => 0, ],
                [ 'value' => 'urunlerde_bagimlilik','name' => 0, ],
                [ 'value' => 'urunlerde_sure','name' => 0, ],
                [ 'value' => 'urunlerde_kargo_fiyati','name' => 0, ],
                [ 'value' => 'urunlerde_video_linki','name' => 0, ],
                [ 'value' => 'urunlerde_stok_miktari','name' => 0, ],
                [ 'value' => 'urunlerde_yeni_urun','name' => 0, ],
                [ 'value' => 'urunlerde_populer_urun','name' => 0, ],
                [ 'value' => 'urunlerde_onecikar_urun','name' => 0, ],



            ]
        );
    }
}


