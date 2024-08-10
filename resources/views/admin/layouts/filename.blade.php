<ul>
    @foreach (getFolderFiles($path) as $file)
        <li class="file-item">
            <a href="{{ route('admin.files.edit', ['file' => str_replace('/', '-', $file->getPathname())]) }}"  style="font-size: 13px">
                {{ $file->getRelativePathname() }} 

             {{--    {{ $file->getRelativePathname() }} --}}
            </a>
        </li>
    @endforeach
</ul>