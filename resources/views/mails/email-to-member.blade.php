@component('mail::message')
# {{ucwords($subject)}}

<?php echo html_entity_decode($message) ; ?>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
