<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'num_setor' => [
            'required' => 'O número do setor é obrigatório.',
            'numeric' => 'O número do setor deve ser numérico',
            'max' => 'O número do setor não pode ser maior que :max.'
        ],
        'quantidade' =>[
            'required' => 'O campo quantidade é obrigatório',
        ]
    ],

];