<!DOCTYPE html>
<html>
<body>
    <h2>Kedves {{ $booking->guest->name }}!</h2>
    <p>Köszönjük, hogy a Mura Vendégházat választottad! Foglalásodat sikeresen rögzítettük rendszerünkben.</p>
    
    <h3>A foglalás részletei:</h3>
    <ul>
        <li><strong>Érkezés:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('Y. m. d.') }}</li>
        <li><strong>Távozás:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('Y. m. d.') }}</li>
        <li><strong>Vendégek:</strong> {{ $booking->adults }} felnőtt, {{ $booking->children }} gyermek</li>
        <li><strong>Végösszeg:</strong> {{ number_format($booking->total_price, 0, ',', '.') }} Ft</li>
    </ul>

    <p>Hamarosan felvesszük veled a kapcsolatot a további teendőkkel kapcsolatban.</p>
    <p>Üdvözlettel,<br>A Mura Vendégház csapata</p>
</body>
</html>