<?php

namespace App\Support;

class Meta
{
    public string $metaTitle;
    public string $metaDesc;
    public string $title;
    public string $description;
    public string $keywords;
    public string $author;
    public string $featured;
    public string $copyright;

    public function __construct()
    {
        $this->metaTitle = 'Umut Yerebakmaz — Official Website';
        $this->title = 'Umut Yerebakmaz — Software Architect & Principal Engineer';
        $this->metaDesc = "Umut Yerebakmaz'ın resmi web sitesi. Yazılım mimarisi, büyük ölçekli projeler, teknoloji ve yazılım geliştirme üzerine içerikler.";
        $this->description = "Umut Yerebakmaz — 25 yıllık deneyime sahip yazılım mimarı ve mühendis. Yazılım geliştirme, sistem tasarımı ve büyük ölçekli projeler üzerine çalışmalar.";
        $this->keywords = 'Umut Yerebakmaz, software architect, principal engineer, yazılım mimarı, yazılım mühendisi, teknoloji, büyük ölçekli projeler';
        $this->author = 'Umut Yerebakmaz';
        $this->copyright = '© ' . date('Y') . ' Umut Yerebakmaz';
        $this->featured = url('umut-yerebakmaz-featured.jpeg');
    }
}
