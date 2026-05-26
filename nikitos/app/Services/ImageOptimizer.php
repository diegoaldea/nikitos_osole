<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageOptimizer
{
    private const MAX_WIDTH = 1600;
    private const MAX_HEIGHT = 1600;
    private const QUALITY = 80;
    private const DISK = 'public';

    public static function store(UploadedFile $file, string $folder): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath())
            ->scaleDown(width: self::MAX_WIDTH, height: self::MAX_HEIGHT);

        $filename = $folder.'/'.Str::uuid()->toString().'.webp';

        Storage::disk(self::DISK)->put(
            $filename,
            (string) $image->toWebp(self::QUALITY)
        );

        return $filename;
    }

    public static function delete(?string $path): void
    {
        if ($path && Storage::disk(self::DISK)->exists($path)) {
            Storage::disk(self::DISK)->delete($path);
        }
    }
}
