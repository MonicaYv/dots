

@foreach ($results['files'] as $file)

    <div class="flex items-center gap-5 file">
        <img class="w-8 h-8" src="{{ asset($constants['FILEICONPATH'].$file->extension.'.png')}}"  alt="" />
        <h1>{{ $file->name }}</h1>
    </div>
@endforeach

@foreach ($results['folders'] as $folder)
    <div class="flex items-center gap-5 folder">
        <img class="w-8 h-8" src="{{ asset($constants['FILEICONPATH'].'folder.png')}}" alt="" />
        <h1>{{ $folder->name }}</h1>
    </div>
@endforeach

