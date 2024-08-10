<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->enum('icerik_resim' , [1 , 0] )->default(1);
            $table->enum('icerik_ekleme' , [1 , 0] )->default(0); // icerik sayfasından ekle butonunu kaldır ,
            $table->enum('icerik_silme' , [1 , 0] )->default(0);
            $table->enum('icerik_duzenleme' , [1 , 0] )->default(0); // eklenen içerikler düzenlenemesin
            $table->enum('icerik_tarih_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_tag_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_url_gosterme' , [1 , 0] )->default(0);
            $table->enum('icerik_link_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_baslik2_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_kisa_aciklama_ekle' , [1 , 0] )->default(0);
            $table->integer('icerik_kategori_id_belirle')->default(0);
            $table->enum('icerik_aciklama_ekleme' , [1 , 0] )->default(0); // içerikte açıklama textareası olmasın
            $table->enum('icerik_dosya1_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_dosya2_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_dosya3_ekle' , [1 , 0] )->default(0);
            $table->enum('icerik_isactive_gosterme' , [1 , 0] )->default(0);
            $table->enum('icerik_alan1_ekle' , [1 , 0] )->nullable(); // deger1 , deger2 , deger3 alanlarına eklenecek
            $table->enum('icerik_alan2_ekle' , [1 , 0] )->nullable();
            $table->enum('icerik_alan3_ekle' , [1 , 0] )->nullable();
            $table->enum('icerik_siralama_ekleme' , [1 , 0] )->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
