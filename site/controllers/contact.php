<?php

use Kirby\Toolkit\Str;

return function ($kirby, $pages, $page) {
    $errors = [];

    if ($kirby->request()->is('POST') && get('submit')) {

        // Honeypot
        if (empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'firstname' => get('firstname'),
            'lastname' => get('lastname'),
            'email' => get('email'),
            'message' => get('message'),
            'terms' => get('terms'),
        ];

        $rules = [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required', 'minLength' => 10],
            'terms' => ['required'],
        ];

        $messages = [
            'firstname' => 'Merci de renseigner votre prénom.',
            'lastname' => 'Merci de renseigner votre nom.',
            'email' => 'Merci de renseigner une adresse email valide.',
            'message' => 'Merci d\'entrer un message de plus de 10 caractères.',
            'terms' => 'Merci d\'accepter les conditions générales.',
        ];

        if ($invalid = invalid($data, $rules, $messages)) {
            $errors = $invalid;
        } else {
            try {
                // $kirby->email([
                //     'template' => 'email',
                //     'from'     => 'yourcontactform@yourcompany.com',
                //     'replyTo'  => $data['email'],
                //     'to'       => 'you@yourcompany.com',
                //     'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                //     'data'     => [
                //         'text'   => esc($data['text']),
                //         'sender' => esc($data['name'])
                //     ]
                // ]);
                $data['created'] = date('Y-m-d H:i:s');

                $page->createChild([
                    'slug' => md5(Str::slug($data['firstname'] . $data['lastname'] . microtime())),
                    'template' => 'contact-submit',
                    'content' => $data,
                    'isDraft' => true
                ]);
            } catch (Exception $error) {
                if (option('debug')) :
                else :
                    $errors['error'] = 'Le formulaire n\'a pas pu être envoyé: <strong>' . $error->getMessage() . '</strong>';
                endif;
                $errors['error'] = 'Le formulaire n\'a pas pu être envoyé!';
            }

            // no exception occurred, let's send a success message
            $success = 'Votre message a bien été envoyé, merci !';
            if (empty($errors) === true) {
                $data = [];
            }
        }
    }

    return [
        'data'    => $data ?? [],
        'errors'   => $errors,
        'success' => $success ?? false
    ];
};
