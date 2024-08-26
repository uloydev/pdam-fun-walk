{{-- email body for registration confirmation --}}
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height: 100vh; background-color:#aeaeae">
    <tr>
        <td align="center">
            <div style="width:50%; max-width:100%; background-color:white; padding: 2rem; border-radius: 10px">
                <img src="{{ asset('assets/img/banner.png') }}" alt="Tirta Asasta Fun Walk" style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                <p>Hai Kawan Asasta,</p>
                <p>Verifikasi diri Anda di bawah ini untuk pendaftaran Tirta Asasta Fun Walk.</p>
                <p>Tautan ini hanya dapat dipakai sekali dan akan kedaluwarsa dalam 10 menit.</p>
                <p>Yuk klik sekarang!</p>
                <a style="display: block; padding: .5rem 0; background-color:#00A6F4; color:white; border-radius:1rem;" href="{{ $link }}">Verikasi Email</a>
            </div>
        </td>
    </tr>
</table>
