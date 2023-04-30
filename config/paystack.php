<?php

return [
    "public_key"    => env("PAYSTACK_PUBLIC_KEY"),
    "secret_key"    => env("PAYSTACK_SECRET_KEY"),
    "url"           => env("PAYSTACK_URL", 'https://api.paystack.co'),
    "merchant_email"           => env("PAYSTACK_MERCHANT_EMAIL"),

    "route" => [
        "middleware"        => ["api"], // For injecting middleware to the package's routes
        "prefix"            => "api/paystack", // For injecting middleware to the package's routes
        "hook_middleware"   => ["validate_paystack_hook", "api"]
    ],
];
