<?

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('your_table_name', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}


