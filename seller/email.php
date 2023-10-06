<?php
use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

class OrderStatusNotification
{
    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $orderStatus;

    public function __construct($receiver, $orderStatus)
    {
        $this->sender = "knitsiteb7@gmail.com";
        $this->password = "cluzaejgwaocjujl";
        $this->receiver = $receiver;
        $this->smtpHost = "smtp.gmail.com";
        $this->smtpPort = 587;
        $this->orderStatus = $orderStatus;
    }

    public function sendOrderStatusNotification()
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->smtpHost;
        $mail->Port = $this->smtpPort;
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body = $this->getHTMLMessage();
        $mail->Subject = "Order Status Notification";
        $mail->SetFrom($this->sender, "Order Status");
        $mail->AddAddress($this->receiver);
        $mail->send();
    }

    public function getHTMLMessage()
    {
        $htmlMessage = <<<MSG
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin-left: 40px;
                    margin-right: 40px;
                }
                .status-container {
                    background-color: #f0f5ff;
                    padding: 10px;
                    border-radius: 5px;
                    text-align: center;
                }

                h2 {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <h2>Knite Site</h2>
            <p>
                Hi,<br>Your order status has been updated.
            </p>
            <p>
            Order Status: {$this->orderStatus}
            </p>
            <div class="status-container">
                <h2 style="color: #007bff;">{$this->orderStatus}</h2>
            </div>
            <p>
                This is an automated email. Please do not reply to this message.
            </p>
            <p><br>
                Best regards,<br>Knite Site
            </p>
        </body>
        </html>
    MSG;
        return $htmlMessage;
    }

}
?>