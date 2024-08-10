<?php

echo url()->current(); // mevcut url 
echo url()->full(); // full url 
echo url()->previous(); // önceki url 
echo route('kitap.ekle.post'); // urlyi yazdır
echo route('kitap.ekle.post',['id' => 1]); // urlyi yazdır




$request->has('dosya1') ifadesi, Laravel'in HTTP isteği nesnesi olan $request üzerinde 
belirli bir giriş alanının var olup olmadığını kontrol eder.
