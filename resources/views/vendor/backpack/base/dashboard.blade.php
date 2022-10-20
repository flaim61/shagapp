@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'card',
        'wrapper' => ['class' => 'd-inline-block w-25'],
        'class' => 'card text-white bg-primary mb-2',
        'content'     => [
            'header' => 'Кол-во пользователей',
            'body' => $userCount
        ]
    ];

    $widgets['before_content'][] = [
        'type'        => 'card',
        'wrapper' => ['class' => 'd-inline-block w-25'],
        'class' => 'card text-white bg-primary mb-2',
        'content'     => [
            'header' => 'header',
            'body' => 'body'
        ]
    ];

    $widgets['before_content'][] = [
        'type'        => 'card',
        'wrapper' => ['class' => 'd-inline-block w-25'],
        'class' => 'card text-white bg-primary mb-2',
        'content'     => [
            'header' => 'header',
            'body' => 'body'
        ]
    ];

    $widgets['before_content'][] = [
        'type'        => 'card',
        'wrapper' => ['class' => 'd-inline-block w-25'],
        'class' => 'card text-white bg-primary mb-2',
        'content'     => [
            'header' => 'header',
            'body' => 'body'
        ]
    ];
@endphp


@section('content')
    <p>Это административная панель</p>
@endsection