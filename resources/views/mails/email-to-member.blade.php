@component('mail::message')

<div class="relative w-100 mb4 bg-near-white">
  <div class="mb3 pa4 mid-gray overflow-hidden">
    <div class="f6"> {{date('D, M j, Y \a\t g:ia')}}  </div>
    <h1 class="f3 near-black">  {{ucwords($subject)}}  </h1>
    <div class="nested-links f5 lh-copy nested-copy-line-height">
      <?php echo $message->saveHTML(); ?>
    </div>
  </div>
</div>

<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
