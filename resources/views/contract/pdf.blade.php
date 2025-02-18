<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1, h2, h3, p { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Contrat</h1>
    @foreach ($editorContent['blocks'] as $block)
        @if ($block['type'] === 'paragraph')
            <p>{!! $block['data']['text'] !!}</p>
        @elseif ($block['type'] === 'header')
            <h{{ $block['data']['level'] }}>{!! $block['data']['text'] !!}</h{{ $block['data']['level'] }}>
        @endif
    @endforeach
</body>
</html>
