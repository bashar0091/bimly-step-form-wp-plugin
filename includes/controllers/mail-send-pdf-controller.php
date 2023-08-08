<?php
// Include the dompdf autoloader
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (isset($_POST['email_pdf_send'])) {

    $pdf_sending_email = $_POST['pdf_sending_email'];

    $work_type_2 = $_POST['work_type_2'];
    $work_address_2 = $_POST['work_address_2'];
    $work_date_2 = $_POST['work_date_2'];
    $work_invester_2 = $_POST['work_invester_2'];
    $investor_representative_2 = $_POST['investor_representative_2'];
    $work_contractor_2 = $_POST['work_contractor_2'];
    $contractor_representative_2 = $_POST['contractor_representative_2'];

    $today_date = date("Y-m-d H:i:s");

    // Form data
    $Mailsubject = 'New Enquiry';
    $Mailto = $pdf_sending_email;

    // Set the sender's email and name
    $senderEmail = 'bimly@gmail.com';
    $senderName = 'Bimly';
    $subject = $Mailsubject;

    // HTML template (same as in your original code)
    // ...
    $message = '
    <div style="width: 595px; margin: 0 auto; padding: 30px;">
     

        <table style="width: 100%;margin-bottom: 20px;">
            <tr>
                <td style="color: #6149CC; font-family: Lato; font-size: 25px; font-weight: 700;">bimly</td>
                <td style="color: #0F082E;font-family: Lato;font-size: 15px;font-weight: 400;text-align: right;">'.$today_date.'r, Białystok</td>
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
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">'.$work_type_2.'</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Adres inwestycji</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">'.$work_address_2.'</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Data odbioru</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">'.$work_date_2.'</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Inwestor</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">'.$work_invester_2.'</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Przedstawiciel Inwestora</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">'.$investor_representative_2.'/td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; background: #F5F5F7; padding: 10px;">Wykonawca</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; background: #F5F5F7; padding: 10px;">'.$work_contractor_2.'</td>
                    </tr>
                    <tr>
                        <td style="color: #656179; font-family: Lato; font-size: 16px; font-weight: 400; padding: 10px;">Przedstawiciel Wykonawcy</td>
                        <td style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 600; padding: 10px;">'.$contractor_representative_2.'</td>
                    </tr>
                </table>
            </div>
        </div>

        <div>
            <div style="color:#0f082e;font-family:Lato;font-size: 18px;font-weight:700;margin: 15px 0;">W toku odbioru stwierdzono następujące usterki:</div>
            <div style="border-radius: 4px; background: var(--greys-dark-5, #F5F5F7); padding: 10px;">
                <div style="color: #0F082E; font-family: Lato; font-size: 16px; font-weight: 400;">Częstym problemem jest sytuacja, kiedy okno możemy otworzyć albo zamknąć, ale nie da się go ustawić w pozycji uchylonej. Może być to spowodowane awarią rozwórki, zgromadzonym w okuciach okiennych brudem, opadnięciem okna na zawiasach albo awarią klamki.</div>
                <div style="color:#0f082e;font-family:Lato;font-size: 17px;font-weight:700;margin: 15px 0;">Usterka istotna</div>
            </div>
        </div>

        <div>
            Przedmiot robót nie nadaje się do odbioru, ponieważ usterki są istotne i uniemożliwiają prawidłowe użytkowanie umowy, zgodnie z uwagami opisanymi w niniejszym protokole.
        </div>

        <div style="
        display: flex;
        justify-content: space-between;
        padding: 30px 0;
    ">
            <div>
                <div>Inwestor</div>
                <div></div>
            </div>
            <div style="
            margin-left: auto;
        ">
                <div>Wykonawca</div>
                <div></div>
            </div>
        </div>

        <div style="
        background: #6149CC;
        display: grid;
        align-items: center;
        padding: 10px;
        grid-template-columns: 1fr 1fr 1fr;
        color: #fff;
    ">
            <div>bimly</div>
            <div style="
            text-align: center;
        "><a href="#" style="
        color: #fff;
    ">www.bilmy.pl</a></div>
            <div></div>
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

    // Suppress errors for the mail function call
    $success = error_reporting(0); // Suppress errors
    $mail_result = mail($Mailto, $subject, $email_body, $headers);
    error_reporting($success); // Restore error reporting

    // Check if mail was sent successfully
    if ($mail_result) {
        header('Location: https://bimly.pilardev.fi/thank-you/');
        exit;
    }
}
?>
