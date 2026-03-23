@extends('layouts.all')

@section('main')
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Добавление товара"></x-breadcrumbs.main>
        </div>
    </section>
    <section class="h1_section">
        <div class="container">
            <h1 class="bg_h1_page">Добавление товара</h1>
        </div>
    </section>

    <section class="import_page_section">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('import_report'))
                @php($report = session('import_report'))
                <div class="alert alert-info" style="margin-bottom: 24px;">
                    <p><strong>Отчет по импорту:</strong></p>
                    <p>Обработано строк: {{ $report['processed'] ?? 0 }}</p>
                    <p>Создано товаров: {{ $report['created'] ?? 0 }}</p>
                    <p>Обновлено товаров: {{ $report['updated'] ?? 0 }}</p>
                    <p>Пропущено строк: {{ $report['skipped'] ?? 0 }}</p>
                    <p>Загружено изображений: {{ $report['images'] ?? 0 }}</p>

                    @if (!empty($report['errors']))
                        <p><strong>Ошибки:</strong></p>
                        <ul>
                            @foreach ($report['errors'] as $lineError)
                                <li>{{ $lineError }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif

            <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 16px;">
                    <label for="excel">Excel файл (.xlsx/.xls)</label>
                    <input type="file" id="excel" name="excel" accept=".xlsx,.xls" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="images">Изображения товаров (можно выбрать несколько)</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple>
                </div>

                <button type="submit" class="button">Запустить импорт</button>
            </form>
        </div>
    </section>
@endsection
