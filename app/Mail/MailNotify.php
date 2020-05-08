<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Notification;
class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $createNoti;
    public function __construct($ar)
    {
        $this->createNoti = $ar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyenducchinh21071998@gmail.com')
                    ->subject('Thông báo mới')
                    ->view('sendMail')
                    ->with([
                        'title' => $this->createNoti['title'],
                        'content' => $this->createNoti['content'],
                        'id_user_notification' => $this->createNoti['id_user_notification'],
                        'notification_id' => $this->createNoti['notification_id']
                    ]);
    }
}
