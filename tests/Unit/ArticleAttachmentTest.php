<?php

namespace Tests\Unit;

use App\Models\ArticleAttachment;
use Tests\TestCase;

class ArticleAttachmentTest extends TestCase
{
    public function test_article_attachment_accepts_file_attribute_on_mass_assignment(): void
    {
        $attachment = new ArticleAttachment([
            'article_id' => 1,
            'file' => 'attachments/file_1.png',
            'file_type' => 1,
        ]);

        $this->assertSame('attachments/file_1.png', $attachment->file);
    }
}
