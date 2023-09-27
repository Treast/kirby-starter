<?php 
return [
    'directives' => [
        'viteCss' => function ($asset)
        {
            return "<?= vite()->css($asset) ?>";
        },
        'viteJs' => function ($asset)
        {
            return "<?= vite()->js($asset) ?>";
        },
    ],
];