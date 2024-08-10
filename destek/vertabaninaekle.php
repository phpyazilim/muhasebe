// SliderController.php

use App\Models\Slider;
use Illuminate\Http\Request;

public function update(Request $request, $id)
{
    // Formdan gelen verileri al
    $slider = Slider::findOrFail($id);
    $slider->title = $request->input('title_tr');
    $slider->sub_title = $request->input('sub_title_tr');
    $slider->sale = $request->input('sale_tr');
    $slider->link = $request->input('link_tr');
    $slider->seo = $request->input('seo_tr');

    // Arkaplan resmini güncelle (Eğer yüklenmişse)
    if ($request->hasFile('background_tr')) {
        $background = $request->file('background_tr');
        $filename = time() . '.' . $background->getClientOriginalExtension();
        $background->move(public_path('uploads'), $filename);
        $slider->background = 'uploads/' . $filename;
    }

    // Değişiklikleri veritabanına kaydet
    $slider->save();

    // Başarılı bir şekilde güncellendiğine dair bir mesaj göster
    return redirect()->route('admin.slider.index')->with('success', 'Slider güncellendi!');
}
