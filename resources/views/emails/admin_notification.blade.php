<!DOCTYPE html>
<html>
<body>
    <h2 style="color: #d9534f;">Új foglalás érkezett az oldalról!</h2>
    <p>Egy vendég az imént sikeresen véglegesített egy foglalást.</p>
    
    <h3>Vendég adatai:</h3>
    <ul>
        <li><strong>Név:</strong> {{ $booking->guest->name }}</li>
        <li><strong>Email:</strong> {{ $booking->guest->email }}</li>
        <li><strong>Telefon:</strong> {{ $booking->guest->phone }}</li>
    </ul>

    <h3>Foglalás adatai:</h3>
    <ul>
        <li><strong>Dátum:</strong> {{ $booking->check_in }} - {{ $booking->check_out }}</li>
        <li><strong>Létszám:</strong> {{ $booking->adults }} felnőtt, {{ $booking->children }} gyermek</li>
        <li><strong>Fűtés:</strong> {{ $booking->wants_heating ? 'Igen' : 'Nem' }}</li>
        <li><strong>Klíma:</strong> {{ $booking->wants_ac ? 'Igen' : 'Nem' }}</li>
        <li><strong>Végösszeg:</strong> {{ number_format($booking->total_price, 0, ',', '.') }} Ft</li>
        <li><strong>Megjegyzés:</strong> {{ $booking->internal_notes ?? '-' }}</li>
    </ul>

    <a href="#">Jelentkezz be az Admin felületre a foglalás kezeléséhez!</a>
</body>
</html>