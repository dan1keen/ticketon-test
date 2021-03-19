@extends('app')
@section('content')
    @if(session()->has('success'))
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <div class="uk-container">
        <div class="" style="width: 70%; margin: 50px auto">
            @if(count($images) > 0)
                <ul uk-accordion>
                    <li>
                        <a class="uk-accordion-title" href="#">Загруженные картинки</a>
                        <div class="uk-accordion-content">
                            <ul>
                                @foreach($images as $key => $parts)
                                    <h3>Части картинки - {{ $key . (count($parts) > 0 ? ' ('.$parts[0]->created_at.')' : '') }}</h3>
                                    @foreach($parts as $image)
                                        <li><a target="_blank" href="{{ route('api.image.show', ['piece_identifier' => $image->piece_identifier, 'part' => $image->partition_no]) }}">{{ $image->getPath() }}</a></li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
@endsection
