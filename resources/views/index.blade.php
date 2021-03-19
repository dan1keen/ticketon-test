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
        <div class="uk-position-center" style="width: 70%; margin: auto">
            <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="uk-margin-small" uk-margin>
                    <div uk-form-custom="target: true" style="width: 100%">
                        <div class="js-upload uk-placeholder uk-text-center uk-position-relative uk-margin-small">
                            <input
                                id="upload_image"
                                class="uk-height-1-1 uk-position-top-left uk-width-1-1"
                                type="file"
                                name="file"
                                placeholder="Select file"
                                accept=".jpg,.png,.jpeg"
                            >
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Перетащите файлы сюда или</span>
                            <div uk-form-custom>
                                <span class="uk-link">загрузите вручную</span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="filename" type="text" placeholder="Файл не выбран" disabled>
                    </div>
                </div>
                <div class="uk-text-center">
                    <button class="uk-button uk-button-default">Загрузить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function () {
            const upload_area = document.querySelector('#upload_image');
            if (upload_area) {
                upload_area.addEventListener('change', (e) => {
                    const filename = document.querySelector('#filename');
                    if (filename) {
                        filename.value = e.target.files.length > 0
                            ? e.target.files[0].name
                            : 'Файл не выбран';
                    }
                });
            }
        })();
    </script>
@endsection

