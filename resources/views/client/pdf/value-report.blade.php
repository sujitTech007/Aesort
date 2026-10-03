<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AESORT Customer Value Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #202a31; font-size: 11px; line-height: 1.5; }
        h1 { font-size: 22px; margin: 0 0 4px; }
        h2 { font-size: 14px; margin: 22px 0 8px; border-bottom: 1px solid #d7dfe2; padding-bottom: 5px; }
        .muted { color: #5d6c73; }
        table { width: 100%; border-collapse: collapse; margin-top: 14px; }
        th, td { border: 1px solid #d7dfe2; padding: 8px; text-align: left; vertical-align: top; }
        th { background: #edf3f3; width: 32%; }
        .notice { background: #f1f4f4; padding: 10px; margin-top: 8px; }
    </style>
</head>
<body>
    <h1>AESORT Customer Value Report</h1>
    <div class="muted">{{ $summary['customer'] }} · Generated {{ $summary['generated_at']->format('M d, Y H:i T') }}</div>
    <table>
        <tbody>
            <tr><th>Reporting period</th><td>{{ $summary['period_start'] }} to {{ $summary['period_end'] }}</td></tr>
            <tr><th>Site scope</th><td>{{ $summary['site_scope'] }}</td></tr>
            <tr><th>Stored readings</th><td>{{ number_format($summary['reading_count']) }}</td></tr>
            <tr><th>Average recorded power</th><td>{{ $summary['average_power'] !== null ? number_format($summary['average_power'], 3) . ' kW' : 'N/A' }}</td></tr>
            <tr><th>Latest reading</th><td>{{ $summary['latest_reading'] ?: 'N/A' }}</td></tr>
        </tbody>
    </table>
    <h2>Interpretation and limitations</h2>
    <p class="notice">{{ $summary['comparison_note'] }}</p>
    <p class="notice">{{ $summary['savings_note'] }}</p>
    <p class="muted">Recorded power is the arithmetic average of stored non-null power readings in the selected period. It is not energy consumption, peak demand, cost, or verified savings.</p>
</body>
</html>
