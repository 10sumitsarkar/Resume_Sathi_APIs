@php
    $siteUrl = rtrim(config('app.frontend_url'), '/');
    $emailAssetUrl = rtrim(config('app.email_asset_url'), '/');
    $resolveEmailImage = static function ($image) use ($emailAssetUrl) {
        return preg_match('/^https?:\/\//i', $image)
            ? $image
            : $emailAssetUrl . '/' . ltrim($image, '/');
    };
    $publicRoot = realpath(public_path());
    $embedEmailImage = static function ($image) use ($message, $publicRoot, $resolveEmailImage) {
        $imagePath = parse_url($image, PHP_URL_PATH) ?: $image;
        $localPath = realpath(public_path(ltrim(rawurldecode($imagePath), '/\\')));
        $extension = $localPath ? strtolower(pathinfo($localPath, PATHINFO_EXTENSION)) : '';

        if (
            $publicRoot
            && $localPath
            && is_file($localPath)
            && strpos(strtolower($localPath), strtolower($publicRoot . DIRECTORY_SEPARATOR)) === 0
            && in_array($extension, ['gif', 'jpeg', 'jpg', 'png'], true)
        ) {
            return $message->embed($localPath);
        }

        return $resolveEmailImage($image);
    };
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Welcome to ResumeSathi</title>
    <style>
        @media only screen and (max-width: 480px) {
            .email-column {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
            }
            .email-grid-cell {
                padding: 8px 18px !important;
            }
            .email-card-image {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                max-height: 180px !important;
            }
        }
    </style>
</head>
<body style="margin:0;padding:0;background:#eef2f8;font-family:Arial,Helvetica,sans-serif;color:#172033;-webkit-text-size-adjust:100%;">
    {{-- Preheader (inbox preview text) --}}
    <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:#eef2f8;font-size:1px;line-height:1px;">
        You're in! Build a professional resume for free in minutes — no sign-up required.
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#eef2f8;">
        <tr>
            <td align="center" style="padding:28px 12px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;background:#ffffff;border-radius:18px;overflow:hidden;border:1px solid #e1e7f0;">

                    {{-- Top accent bar --}}
                    <tr>
                        <td height="6" style="height:6px;line-height:6px;font-size:0;background:#cc0000;">&nbsp;</td>
                    </tr>

                    {{-- Logo --}}
                    <tr>
                        <td align="center" style="padding:30px 20px 8px;">
                            <a href="{{ $siteUrl }}/" target="_blank" style="text-decoration:none;">
                                <img src="{{ $embedEmailImage('email-assets/resumesathi-email-logo.png') }}" width="175" alt="ResumeSathi - Your Career Partner" style="display:block;width:175px;max-width:80%;height:auto;border:0;">
                            </a>
                        </td>
                    </tr>

                    {{-- Hero --}}
                    <tr>
                        <td align="center" style="padding:20px 32px 34px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;">
                                <tr>
                                    <td align="center" style="background:#fdecec;border-radius:999px;padding:6px 14px;font-size:12px;font-weight:bold;letter-spacing:.6px;color:#cc0000;text-transform:uppercase;">
                                        &#10003;&nbsp; Subscription confirmed
                                    </td>
                                </tr>
                            </table>
                            <h1 style="margin:0 0 14px;font-size:28px;line-height:1.3;font-weight:bold;color:#172033;">Thank you for subscribing!</h1>
                            <p style="margin:0 0 12px;font-size:15px;line-height:1.7;color:#526078;">Hello <strong style="color:#172033;">{{ $msg['email'] }}</strong>, you&rsquo;re now part of the ResumeSathi community.</p>
                            <p style="margin:0;font-size:15px;line-height:1.7;color:#526078;">Your next career opportunity starts with a strong resume. Create a professional resume for free in just a few minutes &mdash; no sign-up required.</p>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:26px auto 0;">
                                <tr>
                                    <td align="center" bgcolor="#cc0000" style="border-radius:10px;background:#cc0000;">
                                        <a href="{{ $siteUrl }}/resume/resume-type/" target="_blank" style="display:inline-block;padding:15px 34px;color:#ffffff;font-size:16px;font-weight:bold;text-decoration:none;border-radius:10px;">Create Free Resume &rarr;</a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin:14px 0 0;font-size:12px;line-height:1.5;color:#8a94a6;">100% free &bull; ATS-friendly &bull; Ready in minutes</p>
                        </td>
                    </tr>

                    {{-- Latest Exam Guides --}}
                    @if (count($examGuides))
                    <tr>
                        <td style="padding:26px 28px 6px;border-top:1px solid #e9eef5;">
                            <h2 style="margin:0;font-size:20px;line-height:1.35;color:#172033;">Latest Exam Guides</h2>
                            <p style="margin:6px 0 0;font-size:13px;line-height:1.5;color:#68758a;">Explore the newest exam updates and preparation guides.</p>
                        </td>
                    </tr>
                    @foreach (collect($examGuides)->chunk(2) as $guideRow)
                    <tr>
                        <td style="padding:6px 20px 4px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    @foreach ($guideRow as $guide)
                                    @php
                                        $guideImage = $guide->hero_image
                                            ? $embedEmailImage($guide->hero_image)
                                            : $siteUrl . '/front-assets/images/og/home-og.png';
                                    @endphp
                                    <td class="email-column email-grid-cell" width="50%" valign="top" style="width:50%;padding:8px;">
                                        <a href="{{ $siteUrl }}/exam-guides/{{ rawurlencode($guide->slug) }}/" target="_blank" style="display:block;color:#172033;text-decoration:none;background:#ffffff;border:1px solid #e1e7f0;border-radius:10px;overflow:hidden;">
                                            <img class="email-card-image" src="{{ $guideImage }}" width="250" alt="{{ $guide->title }}" style="display:block;width:100%;max-width:250px;height:120px;object-fit:cover;border:0;">
                                            <span style="display:block;padding:10px 10px 4px;font-size:12px;line-height:1.4;font-weight:bold;color:#172033;">{{ $guide->title }}</span>
                                            <span style="display:block;padding:0 10px 11px;font-size:11px;line-height:1.4;font-weight:bold;color:#cc0000;">View guide &rarr;</span>
                                        </a>
                                    </td>
                                    @endforeach
                                    @if ($guideRow->count() === 1)
                                    <td class="email-column" width="50%" style="width:50%;padding:8px;">&nbsp;</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td height="22" style="height:22px;line-height:22px;font-size:0;">&nbsp;</td>
                    </tr>
                    @endif

                    {{-- Latest Articles --}}
                    @if (count($articles))
                    <tr>
                        <td style="padding:26px 28px 6px;background:#f8fafd;border-top:1px solid #e9eef5;">
                            <h2 style="margin:0;font-size:20px;line-height:1.35;color:#172033;">Latest Articles</h2>
                            <p style="margin:6px 0 0;font-size:13px;line-height:1.5;color:#68758a;">Fresh ideas and practical career advice for you.</p>
                        </td>
                    </tr>
                    @foreach (collect($articles)->chunk(2) as $articleRow)
                    <tr>
                        <td style="padding:6px 20px 4px;background:#f8fafd;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    @foreach ($articleRow as $article)
                                    @php
                                        $articleSlug = $article->url_name;
                                        $articleTitle = $article->article_title;
                                        $articleImage = $article->hero_image
                                            ? $embedEmailImage($article->hero_image)
                                            : $siteUrl . '/front-assets/images/og/blog-og.png';
                                    @endphp
                                    <td class="email-column email-grid-cell" width="50%" valign="top" style="width:50%;padding:8px;">
                                        <a href="{{ $siteUrl }}/blog/{{ rawurlencode($articleSlug) }}/" target="_blank" style="display:block;color:#172033;text-decoration:none;background:#ffffff;border:1px solid #e1e7f0;border-radius:10px;overflow:hidden;">
                                            <img class="email-card-image" src="{{ $articleImage }}" width="250" alt="{{ $articleTitle }}" style="display:block;width:100%;max-width:250px;height:120px;object-fit:cover;border:0;">
                                            <span style="display:block;padding:10px 10px 4px;font-size:12px;line-height:1.4;font-weight:bold;color:#172033;">{{ $articleTitle }}</span>
                                            <span style="display:block;padding:0 10px 11px;font-size:11px;line-height:1.4;font-weight:bold;color:#cc0000;">Read article &rarr;</span>
                                        </a>
                                    </td>
                                    @endforeach
                                    @if ($articleRow->count() === 1)
                                    <td class="email-column" width="50%" style="width:50%;padding:8px;">&nbsp;</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td height="22" style="height:22px;line-height:22px;font-size:0;background:#f8fafd;">&nbsp;</td>
                    </tr>
                    @endif

                    {{-- Social --}}
                    <tr>
                        <td align="center" style="padding:28px 18px 8px;background:#f8fafd;border-top:1px solid #e9eef5;">
                            <p style="margin:0 0 16px;font-size:14px;line-height:1.6;font-weight:bold;color:#172033;">Follow ResumeSathi for more updates</p>
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tr>
                                    <td style="padding:0 6px;">
                                        <a href="https://www.youtube.com/@Resume_Sathi" target="_blank"><img src="{{ $embedEmailImage('email-assets/yt.png') }}" width="38" height="38" alt="YouTube" style="display:block;width:38px;height:38px;border:0;border-radius:50%;"></a>
                                    </td>
                                    <td style="padding:0 6px;">
                                        <a href="https://www.facebook.com/resumesathi" target="_blank"><img src="{{ $embedEmailImage('email-assets/fb.png') }}" width="38" height="38" alt="Facebook" style="display:block;width:38px;height:38px;border:0;border-radius:50%;"></a>
                                    </td>
                                    <td style="padding:0 6px;">
                                        <a href="https://in.pinterest.com/resumesathi/" target="_blank"><img src="{{ $embedEmailImage('email-assets/pin.png') }}" width="38" height="38" alt="Pinterest" style="display:block;width:38px;height:38px;border:0;border-radius:50%;"></a>
                                    </td>
                                    <td style="padding:0 6px;">
                                        <a href="https://www.instagram.com/resume_sathi/" target="_blank"><img src="{{ $embedEmailImage('email-assets/insta.png') }}" width="38" height="38" alt="Instagram" style="display:block;width:38px;height:38px;border:0;border-radius:50%;"></a>
                                    </td>
                                    <td style="padding:0 6px;">
                                        <a href="https://chat.whatsapp.com/GYvFjN782zj1QJ82w2cHIO?s=cl&amp;p=a&amp;mlu=4&amp;ilr=4&amp;iam=2" target="_blank"><img src="{{ $embedEmailImage('email-assets/wa.png') }}" width="38" height="38" alt="WhatsApp" style="display:block;width:38px;height:38px;border:0;border-radius:50%;"></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding:18px 20px 28px;background:#f8fafd;">
                            @if ($unsubscribeUrl)
                            <p style="margin:0 0 12px;font-size:12px;line-height:1.6;color:#68758a;">
                                Don&rsquo;t want these emails?
                                <a href="{{ $unsubscribeUrl }}" style="color:#cc0000;text-decoration:underline;">Unsubscribe</a>
                            </p>
                            @endif
                            <p style="margin:0;font-size:12px;line-height:1.6;color:#8a94a6;">&copy; {{ date('Y') }} ResumeSathi. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
