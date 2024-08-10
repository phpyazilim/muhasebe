
<style> 


    .polBox {
        background-color: #e2dddd;
        border-radius: 0px; 
        padding: 20px !important;
        box-shadow: 1px 3px 8px 1px rgba(0,0,0,0.4);
        width: 70%;
        margin: 0px 50px 0px 30px;
        position: fixed;
       z-index: 999999;
       right:15%;
       left: 15%;
    }
    
    
    
    .myBtn {
     
        font-size: 16px;
        line-height: 20px;
        font-weight: 400;
        font-family: 'Oxygen', sans-serif;
        padding: 20px 54px;
        border-radius: 5px;
        color: #333;
        background-color: red;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        display: block;
        text-align: center;
        outline: none;
        border-style: none;
        width: 150px;
      
    
    }
      
    



    </style>
    
    
    @if(session('cerezOnay'))
  
@else
   
<aside   class=" polBox   "   style="display: block; bottom:0; ">
    <div class="row">
        <div class="col-8"> 
          
            <? /*  {!!getIcerikByIcerikId(1)->baslik!!}  */ ?>   
          
        </div>
        <div class="col-4"> 
            <div class="manage-button text-center">
                <a href="{{route('front.cerezkabul')}}" class="myBtn" style="color:white;">Kabul Et</a>
            </div>    
        </div>
        </div>
  </aside>

@endif

