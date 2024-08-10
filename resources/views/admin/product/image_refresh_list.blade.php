<?php



?>
<div class="card-body">
<table class="table table-bordered table-striped table-hover pictures_list">
    <thead>

    <th class="w50 text-center">#Id</th>
    <th  class="w100">Görsel</th>
    <th>Url</th>
    <th class="w100 text-center">Durumu</th>
    <th class="w100 text-center">Kapak</th>
    <th class="w100 text-center">İşlem</th>

    </thead>

    <tbody class="table-border-bottom-0 sortable  " data-url="{{route('admin.product.imageRankSetter')}}" >

    @foreach($files as $image)
    <tr id="ord-{{$image->id}} " >

        <td class="w50 text-center">#{{$image->id}}</td>
        <td align="center"><img width="50"  src="{{ asset($image->url) }}"   class="img-responsive"></td>
        <td >{{$image->url}}</td>
        <td class=" text-center ">
 
            <label class="switch">
                <input
                    data-url="{{ route('admin.product.imageIsActiveSetter', ['id' => $image->id,'parentId' => $image->parentId,'parent' => 'product' ]) }}"
                    type="checkbox" class="checkbox isActive"
                    {{ $image->isActive == 1 ? 'checked' : '' }}
                >
                <div class="slider"></div>
            </label>
 
        </td>

        <td class="  text-center">
 
            <label class="switch">
                <input

                    data-url="{{ route('admin.product.imageIsCoverSetter', ['id' => $image->id,'parentId' => $image->parentId,] ) }}"
                    type="checkbox" class="checkbox isCover"  {{ $image->isCover == 1 ? 'checked' : '' }}
                >
                <div class="slider"  style=" "></div>
            </label>




        </td>
        <td class="  text-center">

            <form id="removeForm" name="kayitSil" method="post"  action="{{ route('admin.product.imageDelete', ['id' => $image->id] ) }}">
                @csrf
                @method('delete')
                <button type="button"  class="btn  btn-danger btn-sm remove-btn btn-outline"><i class="fa fa-trash"></i>
                      Sil
                </button>
            </form>


        </td>
    </tr>


    @endforeach

    </tbody>


</table>
</div>
