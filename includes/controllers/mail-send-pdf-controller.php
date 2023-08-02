<?php
// Include the dompdf autoloader
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (isset($_POST['email_pdf_send'])) {
    // Form data
    $Mailsubject = 'test';
    $Mailto = 'awalbashar194@gmail.com';

    // Set the sender's email and name
    $senderEmail = 'demo1@gmail.com';
    $senderName = 'Your Name';
    $subject = $Mailsubject;

    // HTML template (same as in your original code)
    // ...
    $message = '
    <div style="width: 595px; margin: 0 auto; padding: 30px;">
     

        <table style="width: 100%;margin-bottom: 20px;">
            <tr>
                <td style="color: #6149CC; font-family: Lato; font-size: 25px; font-weight: 700;">bimly</td>
                <td style="color: #0F082E;font-family: Lato;font-size: 15px;font-weight: 400;text-align: right;">24.06.2023r, Białystok</td>
            </tr>
        </table>

        <div>
            <div style="margin-bottom: 20px;">
                <div style="color: #0F082E; font-family: Lato; font-size: 22px; font-weight: 700;">Protokół odbioru robót</div>
                <div style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 500;">Nr. wewnętrzny 45d65g234c</div>
            </div>
            <div>
                <table style="width: 100%;">
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Rodzaj robót</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">Stolarka okienna</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Adres inwestycji</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">ul. Kościuszki 24, 15-764 Białystok</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Data odbioru</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">17.05.2023r</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Inwestor</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">Jan Kowalski</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Przedstawiciel Inwestora</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">Jerzy Kwiatkowski</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Wykonawca</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">Bartosz Gudewicz</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Przedstawiciel Wykonawcy</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">Piotr Gudewicz</td>
                    </tr>
                </table>
            </div>
        </div>

        <div>
            <div style="color:#0f082e;font-family:Lato;font-size: 18px;font-weight:700;margin: 15px 0;">W toku odbioru stwierdzono następujące usterki:</div>
            <div style="border-radius: 4px; background: var(--greys-dark-5, #F5F5F7); padding: 10px;">
                <div style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 400;">Częstym problemem jest sytuacja, kiedy okno możemy otworzyć albo zamknąć, ale nie da się go ustawić w pozycji uchylonej. Może być to spowodowane awarią rozwórki, zgromadzonym w okuciach okiennych brudem, opadnięciem okna na zawiasach albo awarią klamki.</div>
                <div style="color:#0f082e;font-family:Lato;font-size: 17px;font-weight:700;margin: 15px 0;">Usterka istotna</div>
                <div><img style="width: 100px;height: 85px;object-fit: cover;" src="https://images.pexels.com/photos/17619209/pexels-photo-17619209/free-photo-of-light-road-traffic-vacation.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt=""></div>
            </div>
        </div>
    </div>
    ';

    // Use dompdf for PDF generation
    $dompdf = new Dompdf();
    $dompdf->loadHtml($message);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Get the PDF content
    $pdf_content = $dompdf->output();

    // Set the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
    $headers .= 'From: ' . $senderName . ' <' . $senderEmail . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $senderEmail . "\r\n";

    // Generate the email body (HTML)
    $email_body = "--boundary\r\n";
    $email_body .= "Content-type:text/html;charset=UTF-8\r\n\r\n";
    $email_body .= $message . "\r\n";

    // Attach the PDF to the email
    $pdf_filename = 'template.pdf';
    $email_body .= "--boundary\r\n";
    $email_body .= "Content-Type: application/pdf; name=\"" . $pdf_filename . "\"\r\n";
    $email_body .= "Content-Disposition: attachment; filename=\"" . $pdf_filename . "\"\r\n";
    $email_body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $email_body .= chunk_split(base64_encode($pdf_content)) . "\r\n";
    $email_body .= "--boundary--";

    // Send the email with the PDF attachment
    if (mail($Mailto, $subject, $email_body, $headers)) {
        echo "<h4 style='border: 1px solid;padding: 10px;'>Send Success</h4>";
    } else {
        echo "<h4 style='border: 1px solid;padding: 10px;'>Send Failed</h4>";
    }
}
?>
