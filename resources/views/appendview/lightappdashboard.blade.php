
@foreach ($lightApps as $lightApp)
<div class=" w-10 mr-5 h-14 flex flex-col items-center cursor-pointer text-center break-inside mb-4">
        <a href="#" class="openiframe" data-title="{{ $lightApp->name }}" data-url="{{ $lightApp->link }}" data-image="{{ asset($constants['APPFILEPATH'].$lightApp->icon)}}"> 
          <img class="w-16" src="{{ asset($constants['APPFILEPATH'].$lightApp->icon) }}" alt="{{ $lightApp->name }}"/>
        </a>
        <h2 class="text-white text-lg">{{ $lightApp->name }}</h2>
</div>
@endforeach
@foreach ($folders as $folder)
<div class=" w-10 mr-5 h-14 flex flex-col items-center cursor-pointer text-center break-inside mb-4">
        <a href="#" class="folders" data-title="{{ $folder->name }}" data-parent="{{ $folder->parentpath }}" data-path="{{ $folder->path }}"> 
          <img class="w-16" src="{{ asset($constants['FILEICONPATH'].'folder.png')}}" alt="{{ $folder->name }}"/>
        </a>
        <h2 class="text-white text-lg">{{ $folder->name }}</h2>
</div>
@endforeach
@foreach ($files as $file)
<div class=" w-10 mr-5 h-14 flex flex-col items-center cursor-pointer text-center break-inside mb-4">
        <a href="#" class="files" data-title="{{ $file->name }}" data-parent="{{ $file->parentpath }}" data-path="{{ $file->path }}"> 
          <img class="w-16" src="{{ asset($constants['FILEICONPATH'].$file->extension.'.png')}}" alt="{{ $file->name }}"/>
        </a>
        <h2 class="text-white text-lg">{{ $file->name }}</h2>
</div>
@endforeach


