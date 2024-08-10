<?
/*


Route::get('/blogs/{slug}', [BlogController::class, 'blogDetail'])
    ->name('blog.blog-detail')
    ->whereNumber('id');
	
 ->whereNumber('id') {slug}un integer olmasını zorunlu kılar 


  ->where('slug', '[a-zA-Z0-9\-_]+'); // string zorunlu yapar 

  