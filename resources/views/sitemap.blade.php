<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ URL::to('/') }}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', $current_timestamp) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($allImages as $image)
        <url>
            <loc>{{ Storage::url($image->getfilename()) }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', $image->getaTime()) }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>