<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unsubscribe from ResumeSathi</title>
</head>
<body style="margin:0;padding:32px 16px;background:#eef2f8;font-family:Arial,Helvetica,sans-serif;color:#172033;">
    <main style="max-width:480px;margin:40px auto;padding:32px;background:#fff;border:1px solid #e1e7f0;border-radius:16px;text-align:center;">
        <h1 style="margin:0 0 12px;font-size:24px;">Unsubscribe from emails</h1>
        <p style="margin:0 0 24px;color:#526078;line-height:1.6;">Confirm that you no longer want to receive newsletter emails from ResumeSathi.</p>
        <form method="POST" action="{{ $unsubscribeUrl }}">
            <input type="hidden" name="List-Unsubscribe" value="One-Click">
            <button type="submit" style="padding:12px 24px;border:0;border-radius:8px;background:#cc0000;color:#fff;font-size:16px;font-weight:bold;cursor:pointer;">Unsubscribe</button>
        </form>
    </main>
</body>
</html>
