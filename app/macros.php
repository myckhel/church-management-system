<?php
Illuminate\Http\Request::macro(
  'church',
  fn () => $this->user()->church ?? null
);
