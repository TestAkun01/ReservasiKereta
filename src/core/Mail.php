<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $mailConfig = include(__DIR__ . '/../../config/mail.php');

        $this->mail->isSMTP();
        $this->mail->Host = $mailConfig['host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $mailConfig['username'];
        $this->mail->Password = $mailConfig['password'];
        $this->mail->SMTPSecure = $mailConfig['encryption'];
        $this->mail->Port = $mailConfig['port'];
    }

    public function sendBookingConfirmation($recipientEmail, $tickets, $schedule_id, $reservation_id)
    {
        try {
            $this->mail->setFrom('your_email@example.com', 'Reservasi Kereta');
            $this->mail->addAddress($recipientEmail);

            $this->mail->isHTML(true);
            $this->mail->Subject = 'Konfirmasi Pemesanan Tiket';
            $this->mail->Body = "<h1>Pesanan Tiket Berhasil!</h1>
                                 <p>Terima kasih telah memesan tiket kereta.</p>
                                 <p>Jumlah tiket yang dipesan: $tickets</p>
                                 <p>Reservation ID: $reservation_id</p>
                                 <p>ID Jadwal: $schedule_id</p>";

            $this->mail->send();
        } catch (Exception $e) {
            throw new Exception("Email tidak dapat dikirim. Kesalahan: {$this->mail->ErrorInfo}");
        }
    }
}
