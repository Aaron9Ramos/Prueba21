<div class="mt-8 bg-slate-400">
    <!--public_path('qrcode/'.time().'.png')-->
    {!! QrCode::size(300)
        ->errorCorrection('L')
        ->margin(1)
        ->generate($slot);!!}
</div>