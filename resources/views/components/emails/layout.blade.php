@props([
    'preheader' => null,
    'eyebrow' => null,
    'title' => null,
    'ctaUrl' => null,
    'ctaLabel' => null,
    'footerNote' => null,
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?: config('app.name', 'Onscholarship') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef4fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }
        .email-shell {
            width: 100%;
            background: linear-gradient(180deg, #eef4fb 0%, #f8fbff 100%);
            padding: 32px 12px;
        }
        .email-card {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(15, 36, 65, 0.14);
        }
        .email-hero {
            background: linear-gradient(135deg, #0d47a1 0%, #12315b 55%, #1fa463 100%);
            padding: 34px 34px 28px;
            color: #ffffff;
        }
        .brand-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            font-size: 11px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }
        .email-title {
            margin: 18px 0 0;
            font-size: 34px;
            line-height: 1.18;
            font-weight: 800;
            color: #ffffff;
        }
        .email-content {
            padding: 34px;
        }
        .email-copy {
            font-size: 15px;
            line-height: 1.8;
            color: #475569;
            margin: 0 0 16px;
        }
        .info-box {
            margin: 26px 0;
            padding: 18px 20px;
            border: 1px solid #dbe7f7;
            border-radius: 20px;
            background: linear-gradient(180deg, #f8fbff 0%, #f4f9ff 100%);
        }
        .cta-wrap {
            margin: 30px 0 20px;
        }
        .cta-button {
            display: inline-block;
            padding: 14px 22px;
            border-radius: 16px;
            background: linear-gradient(135deg, #0d47a1 0%, #1fa463 100%);
            color: #ffffff !important;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.02em;
            box-shadow: 0 16px 30px rgba(13, 71, 161, 0.18);
        }
        .footer {
            padding: 0 34px 34px;
            font-size: 13px;
            line-height: 1.8;
            color: #64748b;
        }
        .muted-link {
            color: #0d47a1;
            text-decoration: none;
            font-weight: 700;
        }
        @media only screen and (max-width: 640px) {
            .email-shell {
                padding: 18px 10px;
            }
            .email-hero,
            .email-content,
            .footer {
                padding-left: 22px !important;
                padding-right: 22px !important;
            }
            .email-title {
                font-size: 28px !important;
            }
        }
    </style>
</head>
<body>
    @if($preheader)
        <div style="display:none;max-height:0;overflow:hidden;opacity:0;">
            {{ $preheader }}
        </div>
    @endif

    <div class="email-shell">
        <div class="email-card">
            <div class="email-hero">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="vertical-align: middle;">
                            <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" width="170" style="display:block;max-width:170px;width:100%;height:auto;">
                        </td>
                    </tr>
                </table>

                @if($eyebrow)
                    <div style="margin-top: 22px;">
                        <span class="brand-badge">{{ $eyebrow }}</span>
                    </div>
                @endif

                @if($title)
                    <h1 class="email-title">{{ $title }}</h1>
                @endif
            </div>

            <div class="email-content">
                {{ $slot }}

                @isset($details)
                    <div class="info-box">
                        {{ $details }}
                    </div>
                @endisset

                @if($ctaUrl && $ctaLabel)
                    <div class="cta-wrap">
                        <a href="{{ $ctaUrl }}" class="cta-button">{{ $ctaLabel }}</a>
                    </div>
                @endif
            </div>

            <div class="footer">
                <p style="margin: 0 0 12px;">
                    {{ $footerNote ?: 'Onscholarship helps students and partners access quality education opportunities in China with clear guidance and trusted support.' }}
                </p>
                <p style="margin: 0;">
                    Need help? Email <a href="mailto:info@onscholarship.com" class="muted-link">info@onscholarship.com</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
