<?php

$sections = [
    ['title', 'AESORT Rollout Readiness'],
    ['body', 'Missing Features and Pilot Risks | Codebase review | September 30, 2026'],
    ['body', 'Scope: current Laravel routes, controllers, models, migrations, and admin/client views. No separate rollout-plan document was present in the workspace; findings are compared against the rollout requirements shared in chat.'],
    ['heading', 'Executive Summary'],
    ['body', 'The project has Laravel account, site, device, and subscription CRUD plus a basic KPI dashboard. It is not yet an evidence-backed energy monitoring and savings verification platform. Meter readings, approved baselines, savings evidence, and several operational governance workflows are absent.'],
    ['body', 'Do not present the current sample meter readings or sample report rows as live customer data. Validate Stripe payment server-side before granting a subscription.'],
    ['heading', 'Highest-Priority Gaps'],
    ['bullet', 'P0 - Real energy data: the client meter screen displays fixed sample values (230 V, 5.2, 1.5 kW, 12.5 kWh, 12 devices, 8 active, 85% load, $1,240 bill). ClientController::meters passes only the user; there is no Meter model or meters/readings table.'],
    ['bullet', 'P0 - Payment integrity: Stripe checkout trusts posted amount, plan ID, and site ID. The success route records status=succeeded from session data without retrieving/verifying the Stripe Checkout Session. Checkout is one-time payment while the public plans say per month.'],
    ['bullet', 'P0 - Admin password security: current password is not requested or checked. Form sends confirm_password while Laravel confirmed validation expects new_password_confirmation.'],
    ['bullet', 'P1 - Device integrity: device create/update accepts status, last_active, and installed_at from the browser; update mass-assigns the full request. Telemetry freshness can be manually overwritten, with no required reason or audit log.'],
    ['bullet', 'P1 - Savings governance: no baseline, baseline approval, identified/estimated/implemented/verified savings records, measurement evidence, or verification workflow.'],
    ['heading', 'Feature Coverage'],
    ['bullet', 'Executive KPI dashboard - PARTIAL. It has aggregate counts and charts, but no verified energy KPIs. Current totals are lifetime counts; trend covers six months; cards say Current month. Card period can therefore be misread as the metric calculation period.'],
    ['bullet', 'KPI timestamps - PARTIAL. Latest updated_at/created_at from source tables is shown, not the timestamp of the latest energy ingestion or data pipeline refresh.'],
    ['bullet', 'Customer Energy Value - MISSING. No energy usage, cost, carbon, savings, or verified value model.'],
    ['bullet', 'Portfolio Benchmarking - MISSING/PARTIAL. Existing site type/area fields are not a versioned benchmark library or normalized performance comparison.'],
    ['bullet', 'Analytics & Data - PARTIAL. Registration trends and stored device-status grouping exist; actual meter analytics, completeness rules, alerts, and data lineage do not.'],
    ['bullet', 'POC/onboarding funnel and customer success - MISSING. No POC stages, milestone owners, activation criteria, or recommendation/action tracking.'],
    ['bullet', 'Trust, incidents, integration health - MISSING. No severity/response/closure workflow, integration registry, ingestion health, or operational run history.'],
    ['bullet', 'Audit history - MISSING. audit-logs view is empty; there is no audit model/table or active audit route.'],
    ['bullet', 'Customer reports - MISSING. Reports & Insights contains a hard-coded example row. No customer report export/version/delivery history is implemented.'],
    ['bullet', 'Access roles - MISSING. User accounts rely on numeric role 1/2. No granular AESORT roles/permissions or admin-role management. User Management view is sample content.'],
    ['heading', 'Records and Data Quality'],
    ['bullet', 'Sites - PARTIAL. Current fields include customer, address, city/country, area, type, timezone, and status. Portfolio, province/state, heating fuel, operating hours, data-quality readiness, and baseline status are absent.'],
    ['bullet', 'Devices - PARTIAL. Current fields include site, serial, name/type, firmware, last_active, status, and installed_at. Asset/equipment link, source unit, expected interval, ingestion provenance, and reliable freshness are absent.'],
    ['bullet', 'The live database has no meters, readings, baselines, or admin_audit_logs tables. Current Site/Device schemas do not include the proposed rollout context fields.'],
    ['heading', 'Commercial and Billing'],
    ['bullet', 'Admin plan pricing - RISK. Amount and from/to square-foot bands are directly editable; validation does not enforce nonnegative prices or valid bands. There is no independent approval, plan version/history, or archive safeguard; plans can be hard-deleted.'],
    ['bullet', 'Currency and status - PARTIAL. Stripe hardcodes USD, but subscription records do not retain an explicit currency code. Payment outcome and subscription term are represented by one status field, so Paid and Active/Expired are not independently modeled.'],
    ['bullet', 'Public prices are hard-coded separately in subscription.blade.php and do not derive from admin plan records. Admin billing route also renders a view that expects subscriptions without passing that variable.'],
    ['heading', 'Rollout Sequence'],
    ['body', '1. Replace demo meter values with authenticated, timestamped readings and source/units; build data ingestion and freshness checks.'],
    ['body', '2. Add site/asset context and data completeness controls; define baseline period, method, version, and independent approval.'],
    ['body', '3. Implement savings states and evidence: identified -> estimated -> implemented -> verified, with owner, dates, assumptions, and audit history.'],
    ['body', '4. Add reasoned audit logs, onboarding/POC stages, recommendations/actions, critical incidents, and integration health workflows.'],
    ['body', '5. Secure checkout using server-side approved plan pricing and verified Stripe webhooks/session status; separate payment status, subscription term, renewal, and currency.'],
    ['body', '6. Add role/permission administration, customer report/export management, versioned benchmark library, and acceptance tests for pilot claims.'],
    ['heading', 'Verification Notes'],
    ['body', 'The route list currently exposes CRUD and basic pages only; no workbench, audit-log, customer-export, or pricing-approval routes were found. Only the subscription-plan migration and an empty pending operational-context migration are present.'],
    ['body', 'This is a source-code readiness review, not a penetration test, energy-methodology validation, or production deployment assessment.'],
];

function pdfEscape(string $text): string
{
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
}

$rows = [];
foreach ($sections as [$kind, $text]) {
    $width = $kind === 'bullet' ? 88 : 98;
    $wrapped = wordwrap($text, $width, "\n", true);
    foreach (explode("\n", $wrapped) as $line) {
        $rows[] = [$kind, $line];
    }
    if ($kind === 'heading') {
        $rows[] = ['space', ''];
    }
}

$pages = [];
$page = [];
$lineCount = 0;
foreach ($rows as $row) {
    $cost = $row[0] === 'heading' ? 2 : 1;
    if ($lineCount + $cost > 43 && count($page)) {
        $pages[] = $page;
        $page = [];
        $lineCount = 0;
    }
    $page[] = $row;
    $lineCount += $cost;
}
if (count($page)) {
    $pages[] = $page;
}

$pageCount = count($pages);
$objects = [];
$objects[1] = '<< /Type /Catalog /Pages 2 0 R >>';
$kids = [];
for ($i = 0; $i < $pageCount; $i++) {
    $kids[] = (5 + $i * 2) . ' 0 R';
}
$objects[2] = '<< /Type /Pages /Kids [' . implode(' ', $kids) . '] /Count ' . $pageCount . ' >>';
$objects[3] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>';
$objects[4] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>';

foreach ($pages as $index => $pageRows) {
    $pageId = 5 + $index * 2;
    $streamId = $pageId + 1;
    $commands = "BT /F2 18 Tf 46 794 Td (AESORT Rollout Readiness) Tj ET\n";
    $commands .= 'BT /F1 8 Tf 46 778 Td (Missing features and pilot risks | September 30, 2026 | Page ' . ($index + 1) . ' of ' . $pageCount . ") Tj ET\n";
    $y = 750;
    foreach ($pageRows as [$kind, $line]) {
        if ($kind === 'space') {
            $y -= 7;
            continue;
        }
        $font = $kind === 'title' || $kind === 'heading' ? 'F2' : 'F1';
        $size = $kind === 'title' ? 20 : ($kind === 'heading' ? 12 : 9);
        if ($kind === 'title') {
            $size = 20;
        } elseif ($kind === 'heading') {
            $y -= 4;
        }
        $prefix = $kind === 'bullet' ? '- ' : '';
        $commands .= 'BT /' . $font . ' ' . $size . ' Tf 46 ' . $y . ' Td (' . pdfEscape($prefix . $line) . ") Tj ET\n";
        $y -= $kind === 'heading' ? 19 : ($kind === 'title' ? 25 : 14);
    }
    $commands .= "BT /F1 8 Tf 46 28 Td (AESORT rollout gap review - generated from current repository evidence) Tj ET\n";
    $objects[$pageId] = '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 3 0 R /F2 4 0 R >> >> /Contents ' . $streamId . ' 0 R >>';
    $objects[$streamId] = '<< /Length ' . strlen($commands) . ">>\nstream\n" . $commands . 'endstream';
}

ksort($objects);
$pdf = "%PDF-1.4\n%AESORT\n";
$offsets = [0];
$maxId = max(array_keys($objects));
for ($id = 1; $id <= $maxId; $id++) {
    $offsets[$id] = strlen($pdf);
    $pdf .= $id . " 0 obj\n" . $objects[$id] . "\nendobj\n";
}
$xrefOffset = strlen($pdf);
$pdf .= "xref\n0 " . ($maxId + 1) . "\n0000000000 65535 f \n";
for ($id = 1; $id <= $maxId; $id++) {
    $pdf .= sprintf('%010d 00000 n ', $offsets[$id]) . "\n";
}
$pdf .= 'trailer << /Size ' . ($maxId + 1) . " /Root 1 0 R >>\nstartxref\n" . $xrefOffset . "\n%%EOF\n";

$outputPath = dirname(__DIR__) . '/public/downloads/aesort-rollout-missing-features.pdf';
if (!is_dir(dirname($outputPath))) {
    mkdir(dirname($outputPath), 0775, true);
}
file_put_contents($outputPath, $pdf);
echo "Created {$outputPath} (" . strlen($pdf) . " bytes, {$pageCount} pages)\n";
