<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueryToExpertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $categoryId;
    public $title;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataArr)
    {
        $this->categoryId = !empty($dataArr['category_id']) ? $dataArr['category_id'] : 'Default';
        $this->title = !empty($dataArr['title']) ? $dataArr['title'] : 'Default';
        $this->content = !empty($dataArr['content']) ? $dataArr['content'] : 'Default';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.queryToExpert');
    }
}
