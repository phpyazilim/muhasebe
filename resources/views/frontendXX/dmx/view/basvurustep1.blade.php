@extends('frontend.layouts.master')


@section('getTitle')  Başvuru  @endsection


@section('getDescription')  Başvuru  @endsection


@section('getCss') 
 
@endsection



@section('getslideri')


<div class="sub-banner">
    <section class="banner-section">
        <figure class="mb-0 bgshape">
            <img src="{{asset('frontend/assets/images/homebanner-bgshape.png')}}" alt="" class="img-fluid">
        </figure>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="banner_content">
                        <h1>Ödeme Başvuru</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> Başvuru </span>
    </div>
</div>


@endsection


@section('content') 

 
  
 <!--Contact-->
<section class="message-section">
    <div class="container">
        <figure class="element1 mb-0">
            <img src="{{asset('frontend/assets/images/what-we-do-icon-1.png')}}" class="img-fluid" alt="">
        </figure>
        <div class="row position-relative">
            <div class="col-12">
                <div class="content">
                    <h6> Aşağıdaki Formu Doldurarak Başvuru Yapabilirsiniz</h6>
                    <h2>Üye İşyeri Bilgi Formu</h2>
                    <figure class="element3 mb-0">
                        <img src="{{asset('frontend/assets/images/what-we-do-element.png')}}" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="message_content" data-aos="fade-up">
                    <form id="contactpage" method="POST" action="{{route('front.basvurustep2')}}" >
                        @csrf
                        @method('post')

                        <div class="row">
                          
                          
                            <div class="col-12">
                                <div class="form-group mb-0"> 
                                    <h4>Tabela Adı :</h4>
                                    <input type="text" class="form_style" placeholder="Tabela adını giriniz" required name="tabelaAdi" autocomplete="off"> 
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Kuruluş Tarihi	 :</h4>
                                    <input type="text" class="form_style"  name="kurulusTarihi" placeholder="Kuruluş tarihini giriniz" required  autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Ortaklık Yapısı   :</h4>
                                    
                                    <select name="ortaklikYapisi" id="ortaklikYapisi"  class="formEleman"  >
                                        <option value="tuzel" selected>Tüzel Kişilik</option>
                                        <option value="sahis"  >Şahıs Firması</option>
                                        <option value="dernek" >Dernek ve Vakıf</option>
                                       
                                      </select>
                              
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>İmza Yetkili Kişi Adı Soyadı :</h4>
                                    <input type="text" class="form_style" name="yetkiliKisiIsim" placeholder="İmza yetkilisi kişinin adı soyadı" required  autocomplete="off">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>İmza Yetkili Kişi T.C. Kimlik Numarası  :</h4>
                                    <input type="text" class="form_style" name="yetkiliKisiTcNo" placeholder="İmza yetkilisi kişinin tc kimlik numarası" required  autocomplete="off">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>İmza Yetkili Kişi E-posta :</h4>
                                    <input type="text" class="form_style" name="yetkiliKisiEposta" placeholder="İmza yetkilisi kişinin e-posta adresini giriniz" required  autocomplete="off">
                                </div>
                            </div>

 

                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>İmza Yetkili Kişi Cep Telefonu :</h4>
                                    <input type="text" class="form_style" name="yetkiliKisiTelefon" placeholder="İmza yetkilisi kişinin cep telefonunu giriniz" required  autocomplete="off">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>İş Yeri Telefonu  :</h4>
                                    <input type="text" class="form_style" name="isyeriTelefon" placeholder="İşyeri telefonunuzu giriniz" required  autocomplete="off">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Şehir :    </h4>
 
                                    <select name="sehir" id="sehir"  class="formEleman" required>
                                        <option value="Adana">Adana</option>
                                        <option value="Adıyaman">Adıyaman</option>
                                        <option value="Afyonkarahisar">Afyonkarahisar</option>
                                        <option value="Ağrı">Ağrı</option>
                                        <option value="Amasya">Amasya</option>
                                        <option value="Ankara">Ankara</option>
                                        <option value="Antalya">Antalya</option>
                                        <option value="Artvin">Artvin</option>
                                        <option value="Aydın">Aydın</option>
                                        <option value="Balıkesir">Balıkesir</option>
                                        <option value="Bilecik">Bilecik</option>
                                        <option value="Bingöl">Bingöl</option>
                                        <option value="Bitlis">Bitlis</option>
                                        <option value="Bolu">Bolu</option>
                                        <option value="Burdur">Burdur</option>
                                        <option value="Bursa">Bursa</option>
                                        <option value="Çanakkale">Çanakkale</option>
                                        <option value="Çankırı">Çankırı</option>
                                        <option value="Çorum">Çorum</option>
                                        <option value="Denizli">Denizli</option>
                                        <option value="Diyarbakır">Diyarbakır</option>
                                        <option value="Edirne">Edirne</option>
                                        <option value="Elazığ">Elazığ</option>
                                        <option value="Erzincan">Erzincan</option>
                                        <option value="Erzurum">Erzurum</option>
                                        <option value="Eskişehir">Eskişehir</option>
                                        <option value="Gaziantep">Gaziantep</option>
                                        <option value="Giresun">Giresun</option>
                                        <option value="Gümüşhane">Gümüşhane</option>
                                        <option value="Hakkari">Hakkari</option>
                                        <option value="Hatay">Hatay</option>
                                        <option value="Isparta">Isparta</option>
                                        <option value="Mersin">Mersin</option>
                                        <option value="İstanbul">İstanbul</option>
                                        <option value="İzmir">İzmir</option>
                                        <option value="Kars">Kars</option>
                                        <option value="Kastamonu">Kastamonu</option>
                                        <option value="Kayseri">Kayseri</option>
                                        <option value="Kırklareli">Kırklareli</option>
                                        <option value="Kırşehir">Kırşehir</option>
                                        <option value="Kocaeli">Kocaeli</option>
                                        <option value="Konya">Konya</option>
                                        <option value="Kütahya">Kütahya</option>
                                        <option value="Malatya">Malatya</option>
                                        <option value="Manisa">Manisa</option>
                                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                                        <option value="Mardin">Mardin</option>
                                        <option value="Muğla">Muğla</option>
                                        <option value="Muş">Muş</option>
                                        <option value="Nevşehir">Nevşehir</option>
                                        <option value="Niğde">Niğde</option>
                                        <option value="Ordu">Ordu</option>
                                        <option value="Rize">Rize</option>
                                        <option value="Sakarya">Sakarya</option>
                                        <option value="Samsun">Samsun</option>
                                        <option value="Siirt">Siirt</option>
                                        <option value="Sinop">Sinop</option>
                                        <option value="Sivas">Sivas</option>
                                        <option value="Tekirdağ">Tekirdağ</option>
                                        <option value="Tokat">Tokat</option>
                                        <option value="Trabzon">Trabzon</option>
                                        <option value="Tunceli">Tunceli</option>
                                        <option value="Şanlıurfa">Şanlıurfa</option>
                                        <option value="Uşak">Uşak</option>
                                        <option value="Van">Van</option>
                                        <option value="Yozgat">Yozgat</option>
                                        <option value="Zonguldak">Zonguldak</option>
                                        <option value="Aksaray">Aksaray</option>
                                        <option value="Bayburt">Bayburt</option>
                                        <option value="Karaman">Karaman</option>
                                        <option value="Kırıkkale">Kırıkkale</option>
                                        <option value="Batman">Batman</option>
                                        <option value="Şırnak">Şırnak</option>
                                        <option value="Bartın">Bartın</option>
                                        <option value="Ardahan">Ardahan</option>
                                        <option value="Iğdır">Iğdır</option>
                                        <option value="Yalova">Yalova</option>
                                        <option value="Karabük">Karabük</option>
                                        <option value="Kilis">Kilis</option>
                                        <option value="Osmaniye">Osmaniye</option>
                                        <option value="Düzce">Düzce</option>
                                      </select>

                                      
                             
                             
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Web sitesi  :</h4>
                                    <input type="text" class="form_style" name="websitesi" placeholder="Web sitenizi giriniz" required  autocomplete="off">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Faaliyet Alanı (Sektör)   :</h4>
                                    <input type="text" class="form_style" name="faaliyetAlani" placeholder="Faaliyet gösterdiğiniz sektörü giriniz" required  autocomplete="off">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Aylık Ciro (Ortalama) :</h4>
                                    <input type="text" class="form_style" name="aylikCiro" placeholder="Ortalama aylık cironuzu giriniz" required  autocomplete="off">
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Talep Edilen Ödeme Yöntemleri  :</h4>  
                                     
                                    <select name="talepEdilenOdemeYontemi" id="talepEdilenOdemeYontemi"  class="formEleman"  >
                                        <option value="Blokeli" selected>Blokeli</option>
                                        <option value="Ertesi Gün">Ertesi Gün</option> 
                                      </select>
 
                              
                                </div>
                            </div>


 
                        </div>
                        <div class="manage-button text-center">
                            <button type="submit" class="submit">Sonraki </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

 
 

@endsection




@section('getJs') 
 
@endsection
