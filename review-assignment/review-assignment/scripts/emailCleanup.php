<?php
$emails = ["a@b.com", null, "ab.com", " a@c.com", "b@c.com ", "", "d@e .com", "f@g.com", "yahoo.com", "g@h.com"];

$nonNullEmails = array_filter($$emails, function ($email) {
    return !is_null($email);
});

$nonEmails =
    array_filter(array_map('trim', $nonNullEmails), function ($email) {
        return (filter_var($email, FILTER_VALIDATE_EMAIL))
            ? true
            : false;
    });

sort($nonEmails);

print_r($nonEmails);
